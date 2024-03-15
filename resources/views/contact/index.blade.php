<x-app-layout>

    {{-- per page status --}}
    @if (session('status'))
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-md-0">
            <h2 class="h4">Contacts</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <i class="icon icon-xs me-2 bi bi-plus-lg"></i>
                Add Contacts
            </a>
        </div>
    </div>
    <div class="table-settings mb-4">
        <div class="row align-items-center justify-content-between">
            <div class="col col-md-6 col-lg-3 col-xl-4">
                <form action="{{ route('contacts.index') }}" method="GET">
                    <div class="input-group me-2 me-lg-3 fmxw-400">
                        <input type="text" name="search" id="custom-search-field" value="{{ $searchVal }}"
                            class="form-control" placeholder="Search name">
                        <span class="input-group-text">
                            <button type="submit" class="btn btn-xs">
                                <i class="icon fs-6 bi bi-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="col-4 col-md-2 col-xl-1 ps-md-0 text-end">
                <select id="custom-page-length" class="form-select fmxw-200 d-md-inline"
                    aria-label="Message select example 2">
                    <option value="5" selected>5</option>
                    <option value="10">10</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card card-body border-0 shadow table-wrapper table-responsive mb-5">
        <table class="table table-hover" id="contactTable">
            <thead>
                <tr>
                    <th class="border-gray-200">First Name</th>
                    <th class="border-gray-200">Middle Name</th>
                    <th class="border-gray-200">Last Name</th>
                    <th class="border-gray-200">Email Address</th>
                    <th class="border-gray-200"></th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse ($contacts as $contact)
                    <tr>
                        <td valign="middle">
                            <span class="fw-normal">{{ $contact->first_name }}</span>
                        </td>
                        <td valign="middle"><span class="fw-normal">{{ $contact->middle_name }}</span></td>
                        <td valign="middle"><span class="fw-normal">{{ $contact->last_name }}</span></td>
                        <td valign="middle"><span class="fw-normal">{{ $contact->email_address }}</span></td>
                        <td class="d-flex">
                            <a href="{{ route('contacts.show', $contact->id) }}"
                                class="btn btn-sm btn-outline-primary me-2">Edit</a>
                            <button type="button" class="btn btn-sm btn-danger border-0 shadow" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" onclick="deleteContact({{ $contact->id }})">
                                Delete
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5">No data.</td>
                    </tr>
                @endforelse --}}

            </tbody>
        </table>

        {{-- <div
            class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between"> --}}

        {{-- pagination --}}
        {{-- {{ $contacts->links('vendor.pagination.bootstrap-5') }}

        </div> --}}

    </div>

    <!-- Button trigger modal -->


    {{-- {{-- <!-- Modal --> --}}


    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Contact</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this contact?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
                    <form method="post" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger border-0 shadow">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <x-modal-delete modal-id="contact-modal" button-id="destroy-contact" type="delete" label="contact" />

    {{-- <script>
        function deleteContact(id) {
            document.getElementById('deleteForm').action = "/contacts/" + id;
        }
    </script> --}}
    @push('scripts')
        <script src="{{ asset('js/page/contact/index.js') }}"></script>
    @endpush
</x-app-layout>
