import js from '@eslint/js';
import globals from 'globals';
import eslintts from 'typescript-eslint';
import pluginVue from 'eslint-plugin-vue';
import { defineConfig } from 'eslint/config';
import perfectionist from 'eslint-plugin-perfectionist';
import checkFile from 'eslint-plugin-check-file';
import eslintConfigPrettier from 'eslint-config-prettier/flat';

export default defineConfig([
  {
    files: ['**/*.{js,mjs,cjs,ts,mts,cts,vue}'],
    languageOptions: { globals: { ...globals.browser, ...globals.node } }
  },
  js.configs.recommended,
  ...eslintts.configs.recommended.map(config => ({
    ...config,
    files: ['**/*.{ts,mts,cts}']
  })),
  ...pluginVue.configs['flat/recommended'],
  { files: ['**/*.vue'], languageOptions: { parserOptions: { parser: eslintts.parser } } },
  {
    files: ['**/*.{ts,mts,cts,vue}'],
    plugins: { '@typescript-eslint': eslintts.plugin },
    rules: {
      '@typescript-eslint/no-unused-vars': ['error', { argsIgnorePattern: '^_' }],
      '@typescript-eslint/consistent-type-imports': 'error'
    }
  },
  {
    files: ['**/*.{js,mjs,cjs,ts,mts,cts,vue}'],
    rules: {
      // Qualité générale
      'no-console': ['warn', { allow: ['warn', 'error'] }],
      'prefer-const': 'error',
      eqeqeq: ['error', 'always']
    }
  },
  {
    plugins: { perfectionist },
    rules: {
      'perfectionist/sort-imports': ['error', {
        type: 'natural',
        groups: [
          'builtin',
          'external',
          'internal',
          'parent',
          'sibling',
          'index'
        ]
      }],
      'perfectionist/sort-named-imports': 'error',
      'perfectionist/sort-exports': 'error',
      'perfectionist/sort-named-exports': 'error'
    }
  },
  {
    plugins: { 'check-file': checkFile },
    rules: {
      'check-file/filename-naming-convention': [
        'error',
        { '**/*.vue': 'PASCAL_CASE' }
      ]
    }
  },
  eslintConfigPrettier
]);
