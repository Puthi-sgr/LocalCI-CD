<style>
    .form-group {
        margin-bottom: 1rem;
    }

    label {
        display: inline-block;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .error {
        color: #dc3545;
    }
</style>

<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name', $vendor->name ?? '') }}" class="@error('name') is-invalid @enderror">
    @error('name')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email', $vendor->email ?? '') }}" class="@error('email') is-invalid @enderror">
    @error('email')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" value="{{ old('password', $vendor->password ?? '') }}" class="@error('password') is-invalid @enderror">
    @error('password')
        <div class="error">{{ $message }}</div>
    @enderror
</div>
