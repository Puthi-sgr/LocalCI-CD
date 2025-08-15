# Migration Cheat Sheet

## Create Table
```bash
php artisan make:migration create_{table_name}_table
```

## Add Column
```bash
php artisan make:migration add_{column_name}_to_{table_name}_table --table={table_name}
```

## Drop Column
```bash
php artisan make:migration drop_{column_name}_from_{table_name}_table --table={table_name}
```

## Add Index
```bash
php artisan make:migration add_index_to_{column_name}_on_{table_name}_table --table={table_name}
```

## Drop Index
```bash
php artisan make:migration drop_index_from_{column_name}_on_{table_name}_table --table={table_name}
```

## Add Foreign Key
```bash
php artisan make:migration add_foreign_key_to_{column_name}_on_{table_name}_table --table={table_name} --references={column_name} --on={table_name}
```

## Drop Foreign Key
```bash
php artisan make:migration drop_foreign_key_from_{column_name}_on_{table_name}_table --table={table_name} --references={column_name}
```

## Add Unique Constraint
```bash
php artisan make:migration add_unique_constraint_to_{column_name}_on_{table_name}_table --table={table_name} --unique
```

## Drop Unique Constraint
```bash
php artisan make:migration drop_unique_constraint_from_{column_name}_on_{table_name}_table --table={table_name}
```

## Add Check Constraint
```bash
php artisan make:migration add_check_constraint_to_{column_name}_on_{table_name}_table --table={table_name} --check={condition}
```

## Drop Check Constraint
```bash
php artisan make:migration drop_check_constraint_from_{column_name}_on_{table_name}_table --table={table_name}
```

## Rename Table
```bash
php artisan make:migration rename_{table_name}_table --table={table_name} --new-name={new_table_name}
```

## Rename Column
```bash
php artisan make:migration rename_{column_name}_on_{table_name}_table --table={table_name} --new-name={new_column_name}
```

## Schema Creation Example
```php
Schema::create('products', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('category_id');
    $table->string('name');
    $table->decimal('price', 10, 2);
    $table->timestamps();

    $table->foreign('category_id')->references('id')->on('categories');
});
```
