#!/usr/bin/env node

import { spawnSync } from 'node:child_process';
import path from 'node:path';
import { fileURLToPath } from 'node:url';
import { createRequire } from 'node:module';

const require = createRequire(import.meta.url);
const args = process.argv.slice(2);

const allowedArgs = new Set(['--check', '-h', '--help']);
const invalidArgs = args.filter(arg => !allowedArgs.has(arg));

if (invalidArgs.length > 0) {
  console.error(`Unknown arguments: ${invalidArgs.join(' ')}`);
  printHelp();
  process.exit(2);
}

if (args.includes('-h') || args.includes('--help')) {
  printHelp();
  process.exit(0);
}

const MODE_FIX = 1;
const MODE_CHECK = 2;

const pkgDir = path.dirname(fileURLToPath(import.meta.url));
const rootDir = path.resolve(pkgDir, '..');
const eslintConfig = path.join(rootDir, 'eslint.config.js');
const prettierConfig = path.join(rootDir, 'prettier.config.js');

const eslintBin = require.resolve('eslint/bin/eslint.js');
const prettierBin = require.resolve('prettier/bin/prettier.cjs');

const mode = args.includes('--check') ? MODE_CHECK : MODE_FIX;
const formatResult = runFormat(mode);
const lintResult = runLint(mode);

process.exit(formatResult || lintResult);

function runLint(mode) {
  const eslintArgs = [
    '--config', eslintConfig,
    ...(mode === MODE_FIX ? ['--fix'] : []),
    '.'
  ];

  const result = spawnSync(process.execPath, [eslintBin, ...eslintArgs], { stdio: 'inherit' });
  return result.status ?? 1;
}

function runFormat(mode) {
  const check = mode === MODE_CHECK;

  const prettierArgs = [
    '--config', prettierConfig,
    ...(check ? ['--check'] : ['--write']),
    '.'
  ];

  const result = spawnSync(process.execPath, [prettierBin, ...prettierArgs], { stdio: 'inherit' });
  return result.status ?? 1;
}

function printHelp() {
  console.log(`coding-standards

Usage:
  coding-standards [--check]

Options:
  --check     Check lints and formatting
  --help      Show help
`);
}
