import eslintConfigPrettier from 'eslint-config-prettier';
import js from '@eslint/js';
import typescriptEslint from 'typescript-eslint';

// jsを使う場合、コメントアウトを解除

export default [
    eslintConfigPrettier,
    // {
    //     files: ['src/js/*.js'],
    //     rules: {
    //         ...js.configs.recommended.rules,
    //     },
    // },
    {
        files: ['src/ts/*.ts'],
        rules: {
            ...js.configs.recommended.rules,
            ...typescriptEslint.configs.recommended.rules,
        },
    },
    // {
    //     files: ['src/js/*.js'],
    //     rules: {
    //         ...js.configs.recommended.rules,
    //         'no-unused-vars': 'warn',
    //     },
    // },
    // {
    //     files: ['src/js/*.js'],
    //     rules: {
    //         ...js.configs.all.rules,
    //         'no-unused-vars': 'warn',
    //     },
    // },
    {
        files: ['src/ts/*.ts'],
        rules: {
            ...js.configs.recommended.rules,
            'no-unused-vars': 'warn',
            ...typescriptEslint.configs.recommended.rules,
            'no-unused-vars': 'warn',
        },
    },
    {
        files: ['src/ts/*.ts'],
        rules: {
            ...js.configs.all.rules,
            'no-unused-vars': 'warn',
            ...typescriptEslint.configs.all.rules,
            'no-unused-vars': 'warn',
        },
    },
    { ignores: ['dist', 'node_modules', 'pnpm-lock.yaml'] },
];
