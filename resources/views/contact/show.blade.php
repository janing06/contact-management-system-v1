<x-app-layout>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-md-0">
            <h2 class="h4">Update Contact</h2>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12 col-xl-8">

            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Contact Information</h2>

                <form method="POST" action="{{ route('contacts.update', $contact) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                    name="first_name" type="text" placeholder="First Name"
                                    value="{{ $contact->first_name }}" required>
                                @error('first_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="middle_name">Middle Name</label>
                                <input class="form-control @error('middle_name') is-invalid @enderror" id="middle_name"
                                    name="middle_name" type="text" placeholder="Middle Name"
                                    value="{{ $contact->middle_name }}" required>
                                @error('middle_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                    name="last_name" type="text" placeholder="Last Name"
                                    value="{{ $contact->last_name }}" required>
                                @error('last_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input class="form-control @error('email_address') is-invalid @enderror"
                                    id="email_address" name="email_address" type="email" placeholder="Email Address"
                                    value="{{ $contact->email_address }}" required>
                                @error('email_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="mt-3">
                        <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Update</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</x-app-layout>
