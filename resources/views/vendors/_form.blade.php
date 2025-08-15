<div>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ old('name', $vendor->name ?? '') }}">
    @error('name')
        <div>{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ old('email', $vendor->email ?? '') }}">
    @error('email')
        <div>{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="password">Password:</label>
    @error('password')
        <div>{{ $message }}</div>
    @enderror
</div>