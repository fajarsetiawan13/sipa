<div class="flex flex-col gap-2 w-full lg:w-3/4">
    <table class="table">
        <thead>
            <tr>
                <th colspan="3">Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover">
                <td>Nama</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ auth()->user()->name }}</td>
            </tr>
            <tr class="hover">
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->gender }}</td>
            </tr>
            <tr class="hover">
                <td>Alamat</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->address }}</td>
            </tr>
            <tr class="hover">
                <td>Nomor HP/Telepon</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->phone }}</td>
            </tr>
            <tr class="hover">
                <td>Email</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->email }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
            <tr>
                <th colspan="3">Orang Dengan Demensia (ODD)</th>
            </tr>
        </thead>
        <tbody>
            <tr class="hover">
                <td>Nama</td>
                <td>:</td>
                <td>{{ $account[0]->odd_name }}</td>
            </tr>
            <tr class="hover">
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->odd_gender }}</td>
            </tr>
            <tr class="hover">
                <td>Umur</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->odd_age }}</td>
            </tr>
            <tr class="hover">
                <td>Tahap Alzheimer</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->odd_stage }}</td>
            </tr>
            <tr class="hover">
                <td>Deskripsi Fisik</td>
                <td>:</td>
                <td class="whitespace-pre-line">{{ $account[0]->odd_description }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
            <tr>
                <th colspan="3">Kontak Keluarga</th>
                <th colspan="1" class="flex justify-end"><label class="btn btn-xs text-xs lg:btn-sm lg:text-sm bg-primary border-0 modal-button" for="contact-modal">Tambah</label></th>
            </tr>
        </thead>
        <tbody>
            @if($contact->count())
            @foreach($contact as $c)
            <tr class="hover">
                <td>{{ $loop->iteration }}</td>
                <td class="whitespace-pre-line">{{ $c->family_name }}</td>
                <td class="whitespace-pre-line">{{ $c->phone_number }}</td>
                <td>
                    <label class="btn btn-xs text-xs lg:btn-sm lg:text-sm btn-info rounded-full tooltip inline-flex modal-button" for="edit-contact-{{ $c->id }}" data-tip="edit"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg></label>
                    <form action="/dashboard/contact/{{ $c->id }}" method="POST" class="inline-flex">
                        @csrf
                        @method('delete')
                        <button class="btn btn-xs text-xs lg:btn-sm lg:text-sm btn-error rounded-full tooltip inline-flex" type="submit" data-tip="delete" onclick="return confirm('Are you sure?')"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg></button>
                    </form>
                    <input type="checkbox" id="edit-contact-{{ $c->id }}" class="modal-toggle" />
                    <div class="modal modal-bottom sm:modal-middle">
                        <div class="modal-box">
                            <label for="edit-contact-{{ $c->id }}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                            <h2 class="font-bold text-lg">Ubah Kontak : {{ $c->family_name }}</h2>
                            <p class="py-4">Pastikan kontak dapat dihubungi setiap saat!</p>
                            <form action="/dashboard/contact/{{ $c->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-control">
                                    <label class="label label-text">Nama</label>
                                    <input type="text" placeholder="Nama Kontak" id="family_name" name="family_name" value="{{ $c->family_name }}" class="input input-bordered" autofocus required/>
                                </div>
                                <div class="form-control">
                                    <label class="label label-text">Nomor Telepon/HP/Whatsapp yang aktif</label>
                                    <input type="text" placeholder="Nomor Kontak" id="phone_number" name="phone_number" value="{{ $c->phone_number }}" class="input input-bordered" required/>
                                </div>
                                <div class="modal-action">
                                    <button for="edit-contact-{{ $c->id }}" class="btn btn-primary text-white">Ubah</button>
                                </div>
                            </form>
                        </div>
                    </div>                                
                </td>
            </tr>
            @endforeach
            @else
            <tr class="hover">
                <td colspan="4">- Data Tidak Ditemukan -</td>
            </tr>
            @endif
        </tbody>
    </table>
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th colspan="3">Foto ODD <span class="normal-case text-xs lg:text-sm text-slate-500">(Maks. 5 Foto)</span></th>
                @if($photos->count() < 5)
                <th colspan="1" class="flex justify-end"><label class="btn btn-xs lg:btn-sm text-xs lg:text-sm bg-primary border-0 modal-button" for="odd-modal">Tambah</label></th>
                @else
                <th colspan="1" class="flex justify-end"><label class="btn btn-xs lg:btn-sm text-xs lg:text-sm bg-primary border-0" disabled>Tambah</label></th>
                @endif
            </tr>
        </thead>
    </table>
    <div class="flex flex-wrap w-full justify-start">
        @if($photos->count())
        @foreach($photos as $p)
        <div class="avatar indicator m-2">
            <form action="/photos/{{ $p->id }}/delete" method="POST" class="mt-2 mr-2">
                @method('DELETE')
                @csrf
                <button type="submit" class="indicator-item badge badge-error" onclick="return confirm('Apa Anda Yakin?')">hapus</button>
            </form>
            <div class="w-20 mask mask-squircle">
                <img src="{{ asset('storage/'. $p->image) }}" width="80" height="80" class="max-w-[80px] max-h-[80px] object-cover" alt="Foto ODD"/>
            </div>
        </div>
        @endforeach
        @else
            <p class="pl-2 bg-slate-50 text-xs lg:text-sm">- Data Tidak Ditemukan -</p>
        @endif
    </div>
</div>