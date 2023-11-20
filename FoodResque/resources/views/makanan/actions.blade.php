<!-- resources/views/makanan/actions.blade.php -->

<a href="{{ route('makanan.show', $makanan->id) }}" class="btn btn-info">Detail</a>
<a href="{{ route('makanan.edit', $makanan->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('makanan.destroy', $makanan->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
