<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo isset($page_header) ? $page_header : '';?>
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <?php 
            if ($this->session->flashdata('success')) {
                echo notifications('success', $this->session->flashdata('success'));
            }
            if ($this->session->flashdata('error')) {
                echo notifications('error', $this->session->flashdata('error'));
            }
            if (validation_errors()) {
                echo notifications('warning', validation_errors('<p>', '</p>'));
            }
            ?>
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Standart Bootstrap </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" >
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-2">
                                <label for="namaDepan">Nama Depan</label>
                                <input type="text" class="form-control" placeholder=".col-lg-2">
                          </div>
                            <div class="form-group col-lg-3">
                                <label for="namaDepan">Nama Tengah</label>
                                <input type="text" class="form-control" placeholder=".col-lg-3">
                          </div>
                                <div class="form-group col-lg-4">
                                    <label for="namaDepan">Nama Belakang</label>
                                    <input type="text" class="form-control" placeholder=".col-lg-4">
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="handphone">Handphone</label>
                            <div class="input-group">                                
                                <span class="input-group-addon">+621</span>
                                <input type="text" class="form-control" placeholder="Masukan no hp">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control" placeholder="Masukan email">
                            <p class="help-block">Example herdiesel.santoso@gmail.com</p>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Masukan Password">
                        </div>
                        <div class="form-group">
                            <label for="inputFile">File input</label>
                            <input type="file">
                            <p class="help-block">Maksimal 500Kb.</p>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <div class="checkbox"> 
                                <input type="radio" name="jenis_kelamin" checked="TRUE"> Laki-Laki &nbsp;
                            </div>
                            <div class="checkbox">
                                <input type="radio" name="jenis_kelamin"> Perempuan &nbsp;
                            </div>
                            <div class="checkbox">
                                <input type="radio" name="jenis_kelamin"> Lainya &nbsp;
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                                <select class="form-control">
                                    <option>Teknik Informatika</option>
                                    <option>Sistem Informasi</option>
                                    <option>Manajemen Informasi</option>
                                    <option>Teknik Komputer</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label>Agama</label>
                                <select class="form-control chosen-select">
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Katolik</option>
                                    <option>Hindu</option>
                                    <option>Budha</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label>Keahlian</label>
                            <select class="form-control chosen-select" multiple="TRUE">
                                <option>Jaringan Komputer</option>
                                <option>Pemograman</option>
                                <option>Desain Grafis</option>
                                <option>Multimedia dan Animasi</option>
                                <option>Keamanan Sistem</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label>Kegemaran</label>
                            <div class="checkbox"> 
                                <label><input type="checkbox" name="hobi"> Basket &nbsp;</label>
                                <label><input type="checkbox" name="hobi"> Membaca &nbsp;</label>
                                <label><input type="checkbox" name="hobi"> Menari &nbsp;</label>
                            </div>
                        </div>
                      
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->



    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Standart Bootstrap With Control Size </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="namaOrangTua">Nama Orang Tua</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Orang Tua" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamatOrangTua">Alamat Orang Tua</label>
                            <input type="text" class="form-control" placeholder="Masukan Alamat Orang Tua">
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label>Kota/Kabupaten</label>
                                    <select class="form-control">
                                        <option>Yogyakarta</option>
                                        <option>Bantul</option>
                                        <option>Kulonprogo</option>
                                        <option>Sleman</option>
                                        <option>Gunungkidul</option>
                                    </select>
                            </div>

                            <div class="form-group col-lg-3">
                                <label>Negara</label>
                                    <select class="form-control">
                                        <option>Indonesia</option>
                                        <option>Malaysia</option>
                                        <option>India</option>
                                        <option>Amerika Serikat</option>
                                        <option>Inggris</option>
                                    </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label>Pendidikan Terakhir</label>
                                <select class="form-control chosen-select">
                                    <option>SD</option>
                                    <option>SMP</option>
                                    <option>SMA/SMAK</option>
                                    <option>Sarjana</option>
                                    <option>Magister</option>
                                    <option>Doktor</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <div class="checkbox"> 
                                <input type="radio" name="pekerjaan" checked="TRUE"> PNS &nbsp;
                            </div>
                            <div class="checkbox">
                                <input type="radio" name="pekerjaan"> TNI/POLRI &nbsp;
                            </div>
                            <div class="checkbox">
                                <input type="radio" name="pekerjaan"> SWASTA &nbsp;
                            </div>
                            <div class="row">
                                <div class="checkbox col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="radio" name="pekerjaan"> Lainnya
                                        </span>
                                        <input type="text" class="form-control">
                                    </div><!-- /input-group -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" rows="4"></textarea>
                            </div>
                        </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Form Standart Bootstrap With 2 Column</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">

                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" placeholder="Masukan Nama" >
                                </div>
                                <div class="form-group">
                                    <label for="handphone">Handphone</label>
                                    <div class="input-group">                                
                                        <span class="input-group-addon">+621</span>
                                        <input type="text" class="form-control" placeholder="Masukan no hp">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Alamat Email</label>
                                    <input type="email" class="form-control" placeholder="Masukan email">
                                    <p class="help-block">Example herdiesel.santoso@gmail.com</p>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Masukan Password">
                                </div>
                                <div class="form-group">
                                    <label for="inputFile">File input</label>
                                    <input type="file">
                                    <p class="help-block">Maksimal 500Kb.</p>
                                </div>                            
                            </div><!-- /.box-body -->
                        </div>

                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="checkbox"> 
                                        <input type="radio" name="jenis_kelamin" checked="TRUE"> Laki-Laki &nbsp;
                                    </div>
                                    <div class="checkbox">
                                        <input type="radio" name="jenis_kelamin"> Perempuan &nbsp;
                                    </div>
                                    <div class="checkbox">
                                        <input type="radio" name="jenis_kelamin"> Lainya &nbsp;
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                        <select class="form-control">
                                            <option>Teknik Informatika</option>
                                            <option>Sistem Informasi</option>
                                            <option>Manajemen Informasi</option>
                                            <option>Teknik Komputer</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label>Agama</label>
                                        <select class="form-control chosen-select">
                                            <option>Islam</option>
                                            <option>Kristen</option>
                                            <option>Katolik</option>
                                            <option>Hindu</option>
                                            <option>Budha</option>
                                        </select>
                                </div>

                                <div class="form-group">
                                    <label>Keahlian</label>
                                    <select class="form-control chosen-select" multiple="TRUE">
                                        <option>Jaringan Komputer</option>
                                        <option>Pemograman</option>
                                        <option>Desain Grafis</option>
                                        <option>Multimedia dan Animasi</option>
                                        <option>Keamanan Sistem</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label>Kegemaran</label>
                                    <div class="checkbox"> 
                                        <label><input type="checkbox" name="hobi"> Basket &nbsp;</label>
                                        <label><input type="checkbox" name="hobi"> Membaca &nbsp;</label>
                                        <label><input type="checkbox" name="hobi"> Menari &nbsp;</label>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div> <!-- /.right column --> 

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->


    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Horizontal form </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nama" class="col-lg-3 control-label">Nama Lengkap</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" >
                            </div>
                        </div>
                        <div class="form-inline ">
                            <div class="form-group">                            
                                <label for="namaDepan" class="col-lg-3 control-label">Nama Depan</label>
                                <div class="col-lg-2">
                                    <input type="text" class="form-control" placeholder=".col-lg-2">
                                </div>
                                <label for="namaTengah" class="col-lg-3 control-label">Nama Tengah</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" placeholder=".col-lg-3">
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-lg-3 control-label">Alamat</label>
                            <div class="col-lg-6">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="handphone" class="col-lg-3 control-label">Handphone</label>
                            <div class="col-lg-6">
                                <div class="input-group">                                
                                    <span class="input-group-addon">+621</span>
                                    <input type="text" class="form-control" placeholder="Masukan no hp">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-lg-3 control-label">Alamat Email</label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" placeholder="Masukan email">
                                <p class="help-block">Example herdiesel.santoso@gmail.com</p>
                            </div>
                        </div>  

                        <div class="form-group">
                            <label for="password" class="col-lg-3 control-label">Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" placeholder="Masukan Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputFile" class="col-lg-3 control-label">File input</label>
                            <div class="col-lg-6">
                                <input type="file">
                                <p class="help-block">Maksimal 500Kb.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis Kelamin</label>
                            <div class="col-lg-6">
                                <div class="checkbox"> 
                                    <input type="radio" name="jenis_kelamin" checked="TRUE"> Laki-Laki &nbsp;
                                </div>
                                <div class="checkbox">
                                    <input type="radio" name="jenis_kelamin"> Perempuan &nbsp;
                                </div>
                                <div class="checkbox">
                                    <input type="radio" name="jenis_kelamin"> Lainya &nbsp;
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Jurusan</label>
                            <div class="col-lg-3">
                                <select class="form-control">
                                    <option>Teknik Informatika</option>
                                    <option>Sistem Informasi</option>
                                    <option>Manajemen Informasi</option>
                                    <option>Teknik Komputer</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Agama</label>
                            <div class="col-lg-3">
                                <select class="form-control chosen-select">
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Katolik</option>
                                    <option>Hindu</option>
                                    <option>Budha</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Keahlian</label>
                            <div class="col-lg-3">
                                <select class="form-control chosen-select" multiple="TRUE">
                                    <option>Jaringan Komputer</option>
                                    <option>Pemograman</option>
                                    <option>Desain Grafis</option>
                                    <option>Multimedia dan Animasi</option>
                                    <option>Keamanan Sistem</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Kegemaran</label>
                            <div class="col-lg-3">
                                <div class="checkbox"> 
                                    <label><input type="checkbox" name="hobi"> Basket &nbsp;</label>
                                    <label><input type="checkbox" name="hobi"> Membaca &nbsp;</label>
                                    <label><input type="checkbox" name="hobi"> Menari &nbsp;</label>
                                </div>
                            </div>
                        </div>                  
                    </div><!-- /.box-body -->

                    <div class="box-footer ">
                        <div class="col-lg-offset-3 col-lg-9">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->
