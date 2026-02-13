# JS & TS coding standards

An npm package that provides standard ESLint and Prettier configuration for JS, TS, and Vue projects, exposed
through a single `coding-standards` CLI so consumer projects do not need to manage local config files.

## Setup

Adding JS/TS coding standards to a project
```shell
npm install --save-prod @snapfeat/coding-standards #npm
yarn add --dev @snapfeat/coding-standards #yarn
bun install --dev @snapfeat/coding-standards #bun
```

Add scripts to your project:
```json
{
  "scripts": {
    "cs:fix": "coding-standards",
    "cs:check": "coding-standards --check"
  }
}
```

## Development

If you need to manipulate the `package.json` file, you can run the following command:
```shell
docker run --rm --volume .:/app --workdir /app oven/bun <your-command>
```
