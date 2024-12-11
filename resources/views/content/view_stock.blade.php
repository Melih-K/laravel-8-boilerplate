    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>{{$title}}</h2>
                    <div class="d-flex flex-row-reverse">
                            <button
                            class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewStock"><i
                                class="fas fa-plus"></i>Ekle
                            </button>
                            <button
                                class="btn btn-sm btn-pill btn-outline-success font-weight-bolder mr-2"
                                id="quickAddStock">
                                <i class="fas fa-plus-circle"></i> Hızlı Ekle
                            </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="tableStock">
                                <thead class="font-weight-bold text-center">
                                    <tr>
                                        {{-- <th>No.</th> --}}
                                        <th>Stok Kodu</th>
                                        <th>Açıklama</th>
                                        <th>Birim</th>
                                        <th style="width:90px;">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    {{-- @foreach ($stocks as $r_stocks)
                                        <tr>
                                    <td>{{$r_stocks->id}}</td>
                                    <td>{{$r_stocks->stockCode}}</td>
                                    <td>{{$r_stocks->description}}</td>
                                    <td>{{$r_stocks->unit}}</td>
                                    <td>
                                        <div class="btn btn-success editStock" data-id="{{$r_stocks->id}}">Edit</div>
                                        <div class="btn btn-danger deleteStock" data-id="{{$r_stocks->id}}">Delete</div>
                                    </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal-->
    <div class="modal fade" id="modal-stock" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formStock" name="formStock" enctype="multipart/form-data" >    
                    <div class="form-group">
                        <input type="hidden" name="stock_id" id="stock_id" value="">
                        <input class="form-control" id="stockCode" type="text" name="stockCode" placeholder="Enter Stock Code">
                        <br>
                        <textarea class="form-control" id="description" name="description" placeholder="Açıklama"></textarea>
                        <br>
                        <input class="form-control" id="kdv1" type="number" step="0.1" name="kdv1" placeholder="Kdv 1">
                        <br>
                        <input class="form-control" id="kdv2" type="number" step="0.1" name="kdv2" placeholder="Kdv 2">
                        <br>
                        <input class="form-control" id="kdv3" type="number" step="0.1" name="kdv3"placeholder="Kdv 3">
                        <br>
                        <select name="unit" class="form-control" id="unit">
                            <option value="adet">Adet</option>
                            <option value="kg">Kg</option>
                        </select>
                        <br>
                        <select name="stockType" class="form-control" id="stockType">
                            <option value="TCR" selected>TCR</option>
                        </select>
                        <br>
                        <input class="form-control" id="ekalan1" name="ekalan1" type="text">
                        <br>
                        <input class="form-control" id="ekalan2" name="ekalan2" type="text">
                        <br>
                        <input class="form-control" id="ekalan3" name="ekalan3" type="text">
                        <br>
                        <input class="form-control" id="ekalan4" name="ekalan4" type="text">
                        <br>
                        <input class="form-control" id="ekalan5" name="ekalan5" type="text">
                        <br>
                        <input type="file" name="stockImage[]" id="stockImage" multiple accept="image/png, image/gif, image/jpeg">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="saveBtn">Kaydet</button>
            </div>
        </div>
    </div>
    </div>

    {{-- image modal --}}

    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Stok Fotoğrafları</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" id="carouselImages">
                        </div>
                        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon"  aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- image table modal --}}
    <div class="modal fade" id="stockImagesModal" tabindex="-1" role="dialog" aria-labelledby="stockImagesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stockImagesModalLabel">Stok Fotoğrafları</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table" id="tableImageStock">
                        <thead>
                            <tr>
                                <th>Görsel</th>
                                <th>İsim</th>
                            </tr>
                        </thead>
                        <tbody id="stockImagesTableBody">
                            <!-- Fotoğraflar burada yüklenecek -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Hızlı Stok Ekle Modal -->
    <div class="modal fade" id="quickAddStockModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="quickAddStockLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="quickAddStockLabel">Hızlı Stok Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formQuickStock" name="formQuickStock" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="quickStockCode">Stok Kodu</label>
                            <input class="form-control" id="quickStockCode" type="text" name="stockCode" placeholder="Stok Kodu Girin">
                        </div>
                        <div class="form-group">
                            <label for="quickDescription">Açıklama</label>
                            <textarea class="form-control" id="quickDescription" name="description" placeholder="Açıklama Girin"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="quickKdv1">KDV 1</label>
                            <input class="form-control" id="quickKdv1" type="number" step="0.1" name="kdv1" placeholder="KDV 1">
                        </div>
                        <div class="form-group">
                            <label for="quickKdv2">KDV 2</label>
                            <input class="form-control" id="quickKdv2" type="number" step="0.1" name="kdv2" placeholder="KDV 2">
                        </div>
                        <div class="form-group">
                            <label for="quickKdv3">KDV 3</label>
                            <input class="form-control" id="quickKdv3" type="number" step="0.1" name="kdv3" placeholder="KDV 3">
                        </div>
                        <div class="form-group">
                            <label for="quickUnit">Birim</label>
                            <select name="unit" class="form-control" id="quickUnit">
                                <option value="adet">Adet</option>
                                <option value="kg">Kg</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select type="hidden" name="stockType" class="form-control" id="stockType">
                            <option value="TCR" selected>TCR</option>
                        </select>
                    </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-success font-weight-bold" data-dismiss="modal">Kapat</button>
                    <button type="button" class="btn btn-success font-weight-bold" id="quickSaveBtn">Kaydet</button>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $('document').ready(function () {
            // success alert
            function swal_success() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Başarıyla kaydedildi.',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
            // error alert
            function swal_error() {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Bir şeyler ters gitti !',
                    showConfirmButton: true,
                })
            }
            // table serverside
            var table = $('#tableStock').DataTable({
                processing: false,
                serverSide: true,
                ordering: false,
                dom: 'Bfrtip',
                buttons: [  
                    'copy', 'excel', 'pdf'
                ],
                ajax: "{{ route('stock.index') }}",
                columns: [{
                        data: 'stockCode',
                        name: 'stockCode'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'unit',
                        name: 'unit'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

            // csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // initialize btn add
            $('#createNewStock').click(function () {
                $('#saveBtn').val("create stock");
                $('#stock_id').val('');
                $('#formStock').trigger("reset");
                $('#modal-stock').modal('show');
            });

            // initialize btn edit
            $('body').on('click', '.editStock', function () {
                var stock_id = $(this).data('id');
                $.get("{{route('stocks.index')}}" + '/' + stock_id + '/edit', function (data) {
                    $('#saveBtn').val("edit-stock");
                    $('#modal-stock').modal('show');
                    $('#stock_id').val(data.id);
                    $('#stockCode').val(data.stockCode); // Stok kodu
                    $('#description').val(data.description); // Açıklama
                    $('#kdv1').val(data.kdv1); // KDV 1
                    $('#kdv2').val(data.kdv2); // KDV 2
                    $('#kdv3').val(data.kdv3); // KDV 3
                    $('#unit').val(data.unit); // Birim
                    $('#stockType').val(data.stockType); // Stok türü
                    $('#ekalan1').val(data.ekalan1); // Stok türü
                    $('#ekalan2').val(data.ekalan2); // Stok türü
                    $('#ekalan3').val(data.ekalan3); // Stok türü
                    $('#ekalan4').val(data.ekalan4); // Stok türü
                    $('#ekalan5').val(data.ekalan5); // Stok türü

                })
            });
            
            // initialize btn save
            $('#saveBtn').off('click').on('click', function (e) {
            e.preventDefault();
            var stock_id = $(this).data('id');
            var formData = new FormData($('#formStock')[0]);

            $.ajax({
                data: formData,
                url: "{{ route('stocks.store') }}",
                type: "POST",
                processData: false, // FormData ile çalışırken false olmalı
                contentType: false, // FormData ile çalışırken false olmalı
                success: function (data) {
                    $('#formStock').trigger("reset");
                    $('#modal-stock').modal('hide');
                    swal_success();
                    table.draw();
                },
                error: function (data) {
                    swal_error();
                }
            });
        });
            
            // initialize btn show image
            $('body').on('click', '.showImage', function () {
            var stock_id = $(this).data('id');

            $.ajax({
                url: "/stocks/images/" + stock_id,
                type: "GET",
                success: function (response) {
                    if (response.images.length > 0) {
                        $('#carouselImages').html('');

                        response.images.forEach((image, index) => {
                            var activeClass = index === 0 ? 'active' : ''; 
                            $('#carouselImages').append(`
                                <div class="carousel-item ${activeClass}">
                                    <img src="/${image.path}" class="d-block w-100" alt="Stock Image">
                                </div>
                            `);
                        });

                        $('#imageModal').modal('show');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Resim bulunamadı!',
                            text: 'Bu stok için herhangi bir resim mevcut değil.',
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Resim yüklenirken bir sorun oluştu.',
                    });
                }
            });
        });

            // initialize btn show table image

            $('body').on('click', '.showStockImages', function () {
            var stock_id = $(this).data('id');

            $.ajax({
                url: "/stocks/images/" + stock_id, // Fotoğraf verilerini alacağımız API
                type: "GET",
                success: function (response) {  
                    if (response.images.length > 0) {
                        $('#stockImagesTableBody').html(''); // Önceden eklenmiş verileri temizle
                        
                        response.images.forEach(function (image) {
                            var imageName = image.path.split('/').pop();
                            var cleanName = imageName.replace('stock_images', '');

                            $('#stockImagesTableBody').append(`
                            <tr>
                                <td><img src="/${image.path}" alt="${image.name}" style="width: 100px; height: auto;"></td>
                                <td>${cleanName}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm deleteImage" data-id="${image.id}" data-path="${image.path}">
                                        Sil
                                    </button>
                                </td>
                            </tr>
                        `);
                    });


                        $('#stockImagesModal').modal('show');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Resim bulunamadı!',
                            text: 'Bu stok için herhangi bir resim mevcut değil.',
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Resimler alınırken bir sorun oluştu.',
                    });
                }
            });
        });


            // initailize btn table img delete

            $('body').on('click', '.deleteImage', function () {
                var imageId = $(this).data('id'); // Resmin ID'sini al
                var row = $(this).closest('tr'); // Silinen resmin bulunduğu satırı al

                Swal.fire({
                    title: 'Emin misiniz?',
                    text: "Bu resmi silmek istediğinizden emin misiniz?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Evet, sil!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('stocks.destroyImage', '') }}" + '/' + imageId, 
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function (data) {
                                if (data.success) {
                                    // Resim başarıyla silindiyse, tablo ve modal içeriğinden anında kaldır
                                    row.remove(); // Tablodan kaldır

                                    // Modalda da silinen resmi kaldırmak için:
                                    $('#carouselImages img[src="/' + data.imagePath + '"]').closest('.carousel-item').remove();

                                    // Tablo tamamen boşsa modalı kapat
                                    if ($('#tableImageStock tbody tr').length === 0) {
                                        $('#stockImagesModal').modal('hide'); // Modalı kapat
                                    }

                                    Swal.fire('Başarıyla silindi!', '', 'success');
                                } else {
                                    Swal.fire('Hata!', 'Resim silinemedi.', 'error');
                                }
                            },
                            error: function () {
                                Swal.fire('Hata!', 'Resim silinirken bir sorun oluştu.', 'error');
                            }
                        });
                    }
                });
            });

        // initialize btn delete
        $('body').on('click', '.deleteStock', function () {
            var stock_id = $(this).data("id");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{route('stocks.store')}}" + '/' + stock_id,
                        success: function (data) {
                            swal_success();
                            table.draw();
                        },
                        error: function (data) {
                            swal_error();
                        }
                    });
                }
            })
        });

        // statusing

        });
        $(document).ready(function () {
            // success alert
            function swal_success() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Başarıyla kaydedildi.',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
            // error alert
            function swal_error() {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Bir şeyler ters gitti !',
                    showConfirmButton: true,
                })
            }
            // Hızlı Ekle Modalını Göster
            $('#quickAddStock').click(function () {
                $('#formQuickStock').trigger("reset"); // Formu sıfırla
                $('#quickAddStockModal').modal('show');
            });

            // Hızlı Kaydet Butonu
            $('#quickSaveBtn').off('click').on('click', function (e) {
                e.preventDefault();
                var formData = new FormData($('#formQuickStock')[0]);

                $.ajax({
                    url: "{{ route('stock.quick_add') }}", // Backend'de ayrı bir route eklenmeli
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        $('#formQuickStock').trigger("reset");
                        $('#quickAddStockModal').modal('hide');
                        swal_success();
                        $('#tableStock').DataTable().ajax.reload();
                    },
                    error: function (data) {
                        swal_error();
                    }
                });
            });
        });


    </script>
    @endpush
