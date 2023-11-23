<!-- resources/views/makanan/action.blade.php -->

<a href="{{ route('makanan.show', $makanan->id) }}" class="btn btn-info">View</a>
<a href="{{ route('makanan.edit', $makanan->id) }}" class="btn btn-primary">Edit</a>
<form action="{{ route('makanan.destroy', $makanan->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
</form>
