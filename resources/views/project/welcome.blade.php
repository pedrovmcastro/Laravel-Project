@extends("project.templates.templates")

@section('content')
  <main>
    
    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <h1 class="fw-light">Sistema de Gerenciamento de Produtos</h1>
        <div class="col-lg-6 col-md-8 mx-auto">
          <p class="lead text-body-secondary">Transforme seu inventário em inteligência: gestão de produtos simplificada.</p>
          <p>
            <a href="{{Route("product.create")}}" class="btn btn-primary my-2">Novo Produto</a>
          </p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-body-tertiary">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach($products as $product)
            <div class="col">
              <div class="card shadow-sm">
                <img src="{{ asset('thumbnails/' . $product->thumbnail) }}" class="bd-placeholder-img card-img-top" width="100%" height="225" alt="{{ $product->name }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text">{{ $product->description }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      @guest
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                      @endguest
                    </div>
                    <small class="text-muted">R$ {{ number_format($product->price, 2, ',', '.') }}</small>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </main>
@endsection
