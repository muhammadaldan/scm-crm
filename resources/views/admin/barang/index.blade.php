<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
     
        <div class="row">

            <div class="col-md-12 order-0 mb-4">
                <div class="card h-100">
                    
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Barang List</h5>
                        </div>
                        <a href="{{ route('barang.create') }}" class="btn btn-primary">Create</a>
                    </div>
                    <div class="card-body">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 bg-gray-200">Type</th>
                                    <th class="px-4 py-2 bg-gray-200">Nama</th>
                                    <th class="px-4 py-2 bg-gray-200">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $item->type }}</td>
                                    <td class="border px-4 py-2">
                                        {{ $item->name }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        <div class="d-flex">
                                            <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-primary me-2">Edit</a>
                                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
