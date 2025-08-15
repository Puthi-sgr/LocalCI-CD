## Laravel Eloquent Cheat Sheet

This cheat sheet provides a quick reference to commonly used Eloquent methods in Laravel.

### Basic Retrieval

- **all()**: Retrieves all records from the table.

    ```php
    $vendors = Vendor::all(); // Get all vendors
    ```

- **find($id)**: Retrieves a single record by its primary key.

    ```php
    $vendor = Vendor::find(1); // Get vendor with ID 1
    ```

- **findOrFail($id)**: Retrieves a single record by its primary key. If the record is not found, it throws a `ModelNotFoundException`.

    ```php
    $vendor = Vendor::findOrFail(1); // Get vendor with ID 1 or throw an exception
    ```

- **first()**: Retrieves the first record matching the query.

    ```php
    $vendor = Vendor::where('name', 'Acme Corp')->first(); // Get the first vendor named Acme Corp
    ```

- **firstOrFail()**: Retrieves the first record matching the query. If no record is found, it throws a `ModelNotFoundException`.

    ```php
    $vendor = Vendor::where('name', 'Acme Corp')->firstOrFail(); // Get the first vendor named Acme Corp or throw an exception
    ```

- **get()**: Executes the query and retrieves a collection of records. Usually used after applying constraints (e.g., `where()`).

    ```php
    $vendors = Vendor::where('status', 'active')->get(); // Get all active vendors
    ```

### Query Constraints (Filtering)

- **where($column, $operator, $value)**: Adds a "where" clause to the query.

    ```php
    $vendors = Vendor::where('status', '=', 'active')->get(); // Get active vendors
    $vendors = Vendor::where('name', 'like', '%Acme%')->get(); // Get vendors with "Acme" in their name
    ```

    You can also use shorthand:

    ```php
    $vendors = Vendor::where('status', 'active')->get(); // Equivalent to where('status', '=', 'active')
    ```

- **orWhere($column, $operator, $value)**: Adds an "or where" clause to the query.

    ```php
    $vendors = Vendor::where('status', 'active')
                    ->orWhere('is_featured', true)
                    ->get(); // Get active vendors or featured vendors
    ```

- **whereIn($column, array $values)**: Adds a "where in" clause to the query.

    ```php
    $vendors = Vendor::whereIn('id', [1, 2, 3])->get(); // Get vendors with IDs 1, 2, or 3
    ```

- **whereNotIn($column, array $values)**: Adds a "where not in" clause to the query.

    ```php
    $vendors = Vendor::whereNotIn('id', [4, 5, 6])->get(); // Get vendors with IDs not equal to 4, 5, or 6
    ```

- **whereNull($column)**: Adds a "where null" clause to the query.

    ```php
    $vendors = Vendor::whereNull('email_verified_at')->get(); // Get vendors with unverified emails
    ```

- **whereNotNull($column)**: Adds a "where not null" clause to the query.

    ```php
    $vendors = Vendor::whereNotNull('email_verified_at')->get(); // Get vendors with verified emails
    ```

- **whereBetween($column, array $values)**: Adds a "where between" clause.

    ```php
    $products = Product::whereBetween('price', [10, 100])->get(); // Get products between 10 and 100
    ```

### Ordering & Limiting

- **orderBy($column, $direction)**: Orders the results by the specified column and direction (`asc` or `desc`).

    ```php
    $vendors = Vendor::orderBy('name', 'asc')->get(); // Order vendors by name in ascending order
    ```

- **latest($column)**: Orders the results by the specified column in descending order (typically used for `created_at`).

    ```php
    $vendors = Vendor::latest()->get(); // Get the newest vendors first
    ```

- **oldest($column)**: Orders the results by the specified column in ascending order (typically used for `created_at`).

    ```php
    $vendors = Vendor::oldest()->get(); // Get the oldest vendors first
    ```

- **limit($value)**: Limits the number of results returned.

    ```php
    $vendors = Vendor::limit(10)->get(); // Get the first 10 vendors
    ```

- **offset($value)**: Specifies the number of records to skip.

    ```php
    $vendors = Vendor::offset(10)->limit(5)->get(); // Skips the first 10 records, retrieves next 5
    ```

### Pagination

- **paginate($perPage)**: Paginates the results, returning a `LengthAwarePaginator` instance.

    ```php
    $vendors = Vendor::paginate(10); // Paginate vendors, 10 per page
    ```

- **simplePaginate($perPage)**: Similar to `paginate()`, but doesn't count the total number of records, making it more efficient for large datasets.

    ```php
    $vendors = Vendor::simplePaginate(10); // Paginate vendors, 10 per page (faster for large datasets)
    ```

### Creating, Updating, Deleting

- **create(array $attributes)**: Creates a new record using mass assignment. (Remember to define `$fillable` or `$guarded` in your model).

    ```php
    $vendor = Vendor::create(['name' => 'New Vendor', 'email' => 'new@example.com']);
    ```

- **save()**: Saves the model instance to the database (for both creating and updating).

    ```php
    $vendor = new Vendor();
    $vendor->name = 'New Vendor';
    $vendor->email = 'new@example.com';
    $vendor->save(); // Create a new vendor

    $vendor = Vendor::find(1);
    $vendor->name = 'Updated Vendor';
    $vendor->save(); // Update the vendor with ID 1
    ```

- **update(array $attributes)**: Updates the attributes of the model using mass assignment.

    ```php
    $vendor = Vendor::find(1);
    $vendor->update(['name' => 'Updated Vendor', 'email' => 'updated@example.com']);
    ```

- **delete()**: Deletes the model instance from the database.

    ```php
    $vendor = Vendor::find(1);
    $vendor->delete(); // Delete the vendor with ID 1
    ```

- **destroy($id)**: Deletes one or more records by their primary keys.

    ```php
    Vendor::destroy(1); // Delete the vendor with ID 1
    Vendor::destroy([1, 2, 3]); // Delete vendors with IDs 1, 2, and 3
    ```

### Counting

- **count()**: Returns the number of records matching the query.

    ```php
    $vendorCount = Vendor::count(); // Get the total number of vendors
    $activeVendorCount = Vendor::where('status', 'active')->count(); // Get the number of active vendors
    ```

### Relationships

(Assuming you have relationships defined in your model, e.g., `products()`)

- **with($relations)**: Eager loads the specified relationships. Prevents the N+1 query problem.

    ```php
    $vendors = Vendor::with('products')->get(); // Eager load the products relationship for each vendor
    ```

- **Accessing related models**:

    ```php
    $vendor = Vendor::find(1);
    foreach ($vendor->products as $product) { // Access the vendor's products
        echo $product->name;
    }
    ```

### Scopes

- **Local Scopes**:

    ```php
    // In Vendor model:
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Usage:
    $activeVendors = Vendor::active()->get();
    ```

- **Global Scopes**: Apply to all queries for the model. More complex to set up (require creating a separate class).
