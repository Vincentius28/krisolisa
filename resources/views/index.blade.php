<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My laravel</title>
</head>

<body>
    <p>POST DATA</p>
    <form action="/product" method="POST">
        @csrf
        <input name="name" placeholder="Nama Barang" />
        <input name="price" placeholder="Harga Barang" />
        <input name="qty" placeholder="QTY" />
        <button type="submit">Submit</button>
    </form>

    <p>UPDATE DATA</p>

    <form method="POST" id="edit">
        @csrf
        @method("PATCH")
        <input name="name" id="name" placeholder="Nama Barang" />
        <input name="price" id="price" placeholder="Harga Barang" />
        <input name="qty" id="qty" placeholder="QTY" />
        <button type="submit">Submit</button>
    </form>

    <h3><b>Data Barang</b></h3>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach($barang as $i => $p)
            <tr>
                <td>{{$i}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->price}}</td>
                <td>{{$p->qty}}</td>
                <td>
                    <button onclick="productupdate('{{$p->id}}','{{$p->name}}', '{{$p->price}}', '{{$p->qty}}')">
                        update
                    </button>
                </td>
                <td>
                    <form action="/product/{{ $p->id }}/" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tr>
        </tbody>
</body>

<script>
    function productupdate(id, name, price, qty) {
        document.getElementById('name').value = name;
        document.getElementById('price').value = price;
        document.getElementById('qty').value = qty;
        const form = document.getElementById('edit');
        form.action = `/product/${id}`;

    }
</script>

</html>