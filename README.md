## About Simple Ecommerce Website

### System Specifications

| Requirements | Versions |
| :----------: | :------: |
|   LARAVEL    |   8.x    |
|     PHP      | ^7.4.15  |
|    MYSQL     |   ^5.7   |

## Sites

|          User           |            Admin             |
| :---------------------: | :--------------------------: |
| http://ecommerce.test/ | http://ecommerce.test/admin |

## Configuration

1.  Clone this repository.
    ```bash
        $   git clone https://github.com/igmsebastian/dotty_exam.git
    ```
2.  Recreate environment variable file.
    ```bash
        $   cp .env.example .env
    ```
    -   To create the environment variable file for testing **_(optional)_**
    ```bash
        $   cp .env .env.testing
    ```
3.  Install composer
    ```bash
        $   composer install
    ```
4.  Generate Application Key
    ```bash
        $   php artisan key:generate
    ```
5.  Execute Database Migration and Seeders
    ```bash
        $   php artisan migrate -- seed
    ```
6.  Create a symlink for Storage in Public Directory
    ```bash
        $   php artisan storage:link
    ```

## Development

### Frontend Development

#### Views

1.  Place your `html` files to this path `public\html`.
2.  Place your `vendor` files to this path `public\vendor`.
3.  Place your `css` files to this path `public\css`.
    -   This is **not applicable** for _vue_ and _react_ laravel projects.
4.  Place your `js` files to this path `public\js`.
    -   This is **not applicable** for _vue_ and _react_ laravel projects.

#### Assets

1.  Place your `scss` to this path `resources\sass\...`.

2.  Place your `react` to this path `resources\js\...`.

3.  Execute the following command to compile.
    -   One at a time compilation
        ```bash
            $   npm run dev
        ```
    -   Every saving files compilation
        ```bash
            $   npm run watch
        ```
    -   Publishing files compilation
        ```bash
            $   npm run prod
        ```

### Backend Development

1.  Observe Model-View-Controller (MVC) Design Pattern.

2.  Models should store to this path `app\models`.

3.  DB Migration names should starts with [Action]. Make it readable at all times.

    ```
    2014_10_12_000000_create_users_table
    2014_10_12_000000_alter_users_table_add_hobbies_column
    2014_10_12_000000_alter_users_table_remove_motto_column
    2014_10_12_000000_alter_users_table_update_motto_column_to_longText
    2014_10_12_000000_alter_users_table_update_age_column_to_integer
    2014_10_12_000000_alter_users_table_add_sex_default_male
    2014_10_12_000000_alter_users_table_add_index_keys
    2014_10_12_000000_alter_users_table_add_foreign_key_to_tasks_table
    ```

4.  Add comment headers on every functions.

    ```php
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @param  string|null  $guard
         * @return mixed
         */
        public function handle($request, Closure $next, $guard = null)
        {
            ...
                code goes here ...
            ...

            retrun $next($request);
        }
    ```

## Deployment

| Develop | Staging | Production |
| :-----: | :-----: | :--------: |
| -soon-  | -soon-  |   -soon-   |

## Branching and Versioning

1.  Snake Case is the naming convention for branching.

    > Make sure the changes are relevant with the codes.

    | Issue Number |          Phrase          |    Expected Branch Name     |
    | :----------: | :----------------------: | :-------------------------: |
    |      1       |    create login page     |    #1_create_login_page     |
    |      2       | create user landing page | #2_create_user_landing_page |

2)  Commit Messages Convention.

    > Make the first sentence is the summary of your commit.

    > Make sure the changes are relevant with the codes.

    ```
    Slight modifications on the users table.
    [add] Condition to fetch user by email
    [delete] Condition to fetch user by name
    [update] Add [hobbies - longText] field in user table
    [enhance] Add Logic that can accept dynamic fields
    ```
