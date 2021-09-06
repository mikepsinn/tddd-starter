<?php

$basePath = base_path();

return [

    /**
     * Names & titles
     *
     */
    'names' => [
        'dashboard' => $name = 'Test Driven Development Dashboard',

        'watcher' => $name.' - Watcher',

        'worker' => $name.' - Worker',
    ],

    /**
     * Config files and directories
     *
     */
    'config' => [
        'main' => config_path('ci/main.yml'),

        'projects' => config_path('ci/projects'),
    ],

    /**
     * Route URI prefix
     *
     */
    'url_prefixes' => [
        'global' => '',

        'dashboard' => '',

        'tests' => '/tests',

        'projects' => '/projects',

        'files' => '/files'
    ],

    /**
     * Config file.
     */

    'config_file' => config_path('ci.php'),

    /**
     * Regex to match file names and li
     *
     */
    'regex_file_matcher' => '/([A-Za-z0-9\/._-]+)(?::| on line )([1-9][0-9]*)/',

	/**
	 * How often the dashboard checks for updates
	 *  Reduced because 300 destroys my server
	 */
	'poll_interval' => 20000, // ms
	//'poll_interval' => 300, // ms

    /**
     * Projects
     *
     */
    'projects' => [
        'PHPUnit' => [
            'path' => $basePath,
            'watch_folders' => [
                'app',
                'tests'
            ],
            'exclude' => [
            ],
            'depends' => [],
            'tests_path' => 'tests',
            'suites' => [
                'feature' => [
                    'tester' => 'phpunit',
                    'tests_path' => 'Feature',
                    'command_options' => '',
                    'file_mask' => '*Test.php',
                    'retries' => 0,
                ],

                'unit' => [
                    'tester' => 'phpunit',
                    'tests_path' => 'Unit',
                    'command_options' => '',
                    'file_mask' => '*Test.php',
                    'retries' => 0,
                ],
            ],
        ],

        'Laravel Dusk' => [
            'path' => $basePath,
            'watch_folders' => [
                'app',
                'resources',
                'config',
                'routes',
                'tests/Browser'
            ],
            'exclude' => [
                'tests/Browser/console',
                'tests/Browser/screenshots',
            ],
            'depends' => [],
            'tests_path' => 'tests',
            'suites' => [
                'browser' => [
                    'tester' => 'dusk',
                    'tests_path' => 'Browser',
                    'command_options' => '',
                    'file_mask' => '*Test.php',
                    'retries' => 0,
                ],
            ],
        ],

        'Vanilla Javascript (Jest)' => [
            'path' => $basePath,
            'watch_folders' => [
                'examples/javascript'
            ],
            'exclude' => [
                'storage',
                '.idea',
            ],
            'depends' => [],
            'tests_path' => 'examples/javascript/tests',
            'suites' => [
                'unit' => [
                    'tester' => 'jest',
                    'tests_path' => '',
                    'command_options' => '',
                    'file_mask' => '*.spec.js',
                    'retries' => 0,
                ],
            ],
        ],

        'VueJS (Jest)' => [
            'path' => $basePath.'/examples/vue-jest',
            'watch_folders' => [
                'src',
                'tests'
            ],
            'exclude' => [
                'tests/__snapshots__',
            ],
            'depends' => [],
            'tests_path' => 'tests',
            'suites' => [
                'unit' => [
                    'tester' => 'jest',
                    'tests_path' => '',
                    'command_options' => '',
                    'file_mask' => '*.test.js',
                    'retries' => 0,
                    'editor' => 'vscode',
                ],
            ],
        ],

        'VueJS (vue-test-utils)' => [
            'path' => $basePath.'/examples/vue-test-utils',
            'watch_folders' => [
                'components',
            ],
            'exclude' => [
                'node_modules'
            ],
            'depends' => [],
            'tests_path' => 'components',
            'suites' => [
                'unit' => [
                    'tester' => 'jest',
                    'tests_path' => '',
                    'command_options' => '',
                    'file_mask' => '*.test.js',
                    'retries' => 0,
                    'editor' => 'vscode',
                ],
            ],
        ],

        'VueJS (AVA)' => [
            'path' => $basePath.'/examples/vue-ava',
            'watch_folders' => [
                'src',
                'test',
            ],
            'exclude' => [
                'node_modules'
            ],
            'depends' => [],
            'tests_path' => 'test',
            'suites' => [
                'unit' => [
                    'tester' => 'ava',
                    'tests_path' => '',
                    'command_options' => '',
                    'file_mask' => '*.test.js',
                    'retries' => 0,
                    'editor' => 'vscode',
                ],
            ],
        ],

        "React" => [
            'path' => $basePath.'/examples/react',
            'watch_folders' => [
                'src',
            ],
            'exclude' => [
            ],
            'depends' => [],
            'tests_path' => 'src',
            'suites' => [
                'unit' => [
                    'tester' => 'react-scripts',
                    'tests_path' => '',
                    'command_options' => '',
                    'file_mask' => '*.test.js',
                    'retries' => 0,
                ],
            ],
        ],

        "Ruby on Rails" => [
            'path' => $basePath.'/examples/ruby-on-rails',
            'watch_folders' => [
                'app',
                'config',
                'db',
                'lib',
                'test',
            ],
            'exclude' => [
            ],
            'depends' => [],
            'tests_path' => 'test',
            'suites' => [
                'unit' => [
                    'tester' => 'rake',
                    'tests_path' => '',
                    'command_options' => '',
                    'file_mask' => '*_test.rb',
                    'retries' => 0,
                    'editor' => 'vscode',
                ],
            ],
        ],

        'Multiple suites' => [
            'path' => $basePath,
            'watch_folders' => [
                'app',
            ],
            'exclude' => [
                'storage',
                '.idea',
            ],
            'depends' => [],
            'tests_path' => 'tests/Multiple/',
            'suites' => [
                'page_module' => [
                    'tester' => 'phpunit',
                    'tests_path' => 'Modules/Page/Tests',
                    'command_options' => '',
                    'file_mask' => '*Test.php',
                    'retries' => 0,
                ],
                'core_module' => [
                    'tester' => 'phpunit',
                    'tests_path' => 'Modules/Core/Tests',
                    'command_options' => '',
                    'file_mask' => '*Test.php',
                    'retries' => 0,
                ],
            ],
        ],

        'Firewall (PragmRX)' => [
            'path' => $basePath.'/vendor/pragmarx/firewall',
            'watch_folders' => [
                'src',
                'tests'
            ],
            'exclude' => [
                'tests/database.sqlite',
                'tests/geoipdb',
                'tests/files',
            ],
            'depends' => [],
            'tests_path' => 'tests',
            'suites' => [
                'unit' => [
                    'tester' => 'phpunit',
                    'tests_path' => '',
                    'command_options' => '',
                    'file_mask' => '*Test.php',
                    'retries' => 0,
                ],
            ],
        ],

        'Symfony (4.0-BETA) Flex' => [
            'path' => $basePath.'/examples/symfony4/vendor/symfony/flex',
            'watch_folders' => [
                'src',
                'tests'
            ],
            'exclude' => [
            ],
            'depends' => [],
            'tests_path' => 'tests',
            'suites' => [
                'unit' => [
                    'tester' => 'simple-phpunit',
                    'tests_path' => '',
                    'command_options' => '',
                    'file_mask' => '*Test.php',
                    'retries' => 0,
                ],
            ],
        ],
    ],

    /**
     * Notifications
     *
     */
    'notifications' => [
        'notify_on' => [
            'fail' => true,
            'pass' => false, // not implemented
        ],

        'routes' => [
            'dashboard' => 'tests-watcher.dashboard'
        ],

        'action-title' => 'Tests Failed',

        'action_message' => "One or more tests have failed.",

        'from' => [
            'name' => $name,

            'address' => 'laravel-tw@mydomain.com',

            'icon_emoji' => '',

            'icon_url' => 'https://emojipedia-us.s3.amazonaws.com/thumbs/120/apple/96/lady-beetle_1f41e.png'
        ],

        'users' => [
            'model' => PragmaRX\TestsWatcher\Package\Data\Models\User::class, // App\User::class,

            'emails' => [
                'laravel-ci@mydomain.com',
            ],
        ],

        'channels' => [
            'mail' => [
                'enabled' => false,
                'sender'  => PragmaRX\TestsWatcher\Package\Notifications\Channels\Mail::class,
            ],

            'slack' => [
                'enabled' => true,
                'sender'  => PragmaRX\TestsWatcher\Package\Notifications\Channels\Slack::class,
            ],
        ],

        'notifier' => 'PragmaRX\TestsWatcher\Notifications',
    ],

    /**
     * Editors
     *
     */
    'editors' => [
        'phpstorm' => [
            'name' => 'PHPStorm',

            'bin' => '/usr/local/bin/pstorm {file}:{line}',

            'default' => true,
        ],

        'sublime' => [
            'name' => 'SublimeText 3',

            'bin' => '/usr/local/bin/subl {file}:{line}',
        ],

        'vscode' => [
            'name' => 'VSCode',

            'bin' => '/Applications/Visual\ Studio\ Code.app/Contents/Resources/app/bin/code --goto {file}:{line}',
        ],
    ],

    /**
     * tee
     *
     */
    'tee' => '/usr/bin/tee',

    /**
     * script
     *
     */
    'script' => '/usr/bin/script -q %s %s', // sprintf()

    /**
     * Temp path
     *
     */
    'tmp' => sys_get_temp_dir(),

    /**
     * Testers
     *
     */
    'testers' => [

        'phpunit' => [
            'command' => 'vendor/bin/phpunit',
            'require_script' => true,
        ],

        'simple-phpunit' => [
            'command' => 'vendor/bin/simple-phpunit',
            'require_script' => true,
        ],

        'dusk' => [
            'command' => 'php artisan dusk',
            'output_folder' => "{$basePath}/tests/Browser/screenshots",
            'output_html_fail_extension' => '.fail.html',
            'output_png_fail_extension' => '.fail.png',
            'require_tee' => false,
            'require_script' => true,
            'error_pattern' => '(Failures|Errors): [0-9]+', // regex, only for tee results
        ],

        'codeception' => [
            'command' => 'sh %project_path%/vendor/bin/codecept run',
            'output_folder' => 'tests/_output',
            'output_html_fail_extension' => '.fail.html',
            'output_png_fail_extension' => '.fail.png',
        ],

        'phpspec' => [
            'command' => 'phpspec run',
        ],

        'behat' => [
            'command' => 'sh vendor/bin/behat',
        ],

        'atoum' => [
            'command' => 'sh vendor/bin/atoum',
        ],

        'tester' => [
            'command' => 'sh vendor/bin/tester',
        ],

        'jest' => [
            'command' => 'npm test',
            'require_script' => true,
            'output_folder' => "tests/__snapshots__",
            'output_html_fail_extension' => '.snap',
        ],

        'react-scripts' => [
            'env' => 'CI=true',
            'command' => 'npm test',
            'require_script' => true,
            'error_pattern' => 'Test\s+Suites:\s+[0-9]+\s+failed', // regex, only for tee results
        ],

        'rake' => [
            'command' => 'bin/rails test',
            'require_script' => true,
            'error_pattern' => 'Test\s+Suites:\s+[0-9]+\s+failed', // regex, only for tee results
        ],

        'ava' => [
            'command' => 'node_modules/.bin/ava --verbose',
            'require_script' => true,
            'error_pattern' => '[1-9]+\s+(exception|failure)', // regex, only for tee results
        ],

    ],

    /**
     * Progress
     *
     */
    'show_progress' => false,

];
