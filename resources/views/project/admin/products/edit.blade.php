@extends("project.templates.templates")

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Produto</div>

                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome do Produto</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Preço</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Imagem</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" onchange="previewImage(event)">
                            @if($product->thumbnail)
                                <img id="thumbnail-preview" src="{{ asset('thumbnails/' . $product->thumbnail) }}" class="mt-3" width="150" alt="{{ $product->name }}">
                            @else
                                <img id="thumbnail-preview" src="#" class="mt-3" style="display:none; width:150px;" alt="Preview da Imagem">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Atualizar Produto</button>
                    </form>

                    {{-- Botão de Deletar --}}
                    <form id="deleteForm" action="{{ route('product.destroy', $product->id) }}" method="POST" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $product->name }}')">Deletar Produto</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var preview = document.getElementById('thumbnail-preview');
        preview.style.display = 'block';
        preview.src = URL.createObjectURL(event.target.files[0]);
    }

    function confirmDelete(productName) {
        if (confirm(`Tem certeza que deseja deletar o produto ${productName}?`)) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>

@endsection