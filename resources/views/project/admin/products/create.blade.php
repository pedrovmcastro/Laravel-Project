@extends("project.templates.templates")

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar Novo Produto</div>

                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome do Produto</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Preço</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Imagem</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Criar Produto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection