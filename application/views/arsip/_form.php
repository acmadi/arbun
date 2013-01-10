<?php $this->load->view('theme/validation'); ?>
<div class="row" style="margin:10px">
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#">Pribadi</a></li>
	  <li><?php echo anchor('arsip/createlain', 'Orang Lain'); ?></li>
	</ul>
	<div class="span4">
		<label>Judul :</label>
		<?php echo form_input('Buku[judul]', $model->judul) ?>
		<label>Abstrak :</label>
		<?php echo form_textarea('Buku[abstrak]', $model->abstrak, 'cols="2" rows="5"') ?>
		<p class="help-block">Kategori, Mata Kuliah dan Bidang dipisahkan dengan koma untuk masing-masing item</p>
		<label>Kategori :</label>
		<?php echo form_input('Buku[kategoriku]', $model->kategoriku, 'placeholder="Makalah, Tugas Akhir"') ?>
		<label>Mata Kuliah :</label>
		<?php echo form_input('Buku[matkulku]', $model->matkulku, 'placeholder="Struktur Diskrit, Algoritma dan Struktur Data"') ?>
		<label>Bidang :</label>
		<?php echo form_input('Buku[bidangku]', $model->bidangku, 'placeholder="Stack, Graf, Pohon"') ?>
		<label>Status :</label>
		<?php $arr = array(1=>'Publik', 2=>'Internal'); ?>
		<?php echo form_dropdown('Buku[status]', $arr, $model->status) ?>
	</div>
	<div class="span4">
		<h5>Unggah Arsip</h5>
		<legend></legend>
    <ul id="myTab" class="nav nav-tabs">
      <li class="active"><a href="#filelokal" data-toggle="tab">File Lokal</a></li>
      <li><a href="#publicurl" data-toggle="tab">Public URL</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane fade active in" id="filelokal">
        <?php echo form_upload('upload_pdf'); ?>
        <p class="help-block">File berupa format PDF dengan ukuran maks 2MB</p>
      </div>
      <div class="tab-pane fade" id="publicurl">
      	<label>Link URL :</label>
        <?php echo form_input('Buku[upload_url]', '', 'placeholder="http://example.com/mybook.pdf"'); ?>
      </div>
    </div>

		<h5>Informasi Tambahan</h5>
		<legend></legend>
		<label>Jilid :</label>
		<?php echo form_input('Buku[jilid]', $model->jilid) ?>
		<label>Penerbit :</label>
		<?php echo form_input('Buku[penerbit]', $model->penerbit) ?>
		<label>ISBN :</label>
		<?php echo form_input('Buku[ISBN]', $model->ISBN) ?>
		<label>Tanggal Terbit :</label>
		<?php echo form_input('Buku[tgl_terbit]', $model->tgl_terbit) ?>
	</div>
</div>
<div class="form-actions">
	<button type="submit" class="btn btn-success">Simpan</button>
</div>