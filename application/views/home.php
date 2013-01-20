<div class="container">
      <div class="span6 desk" style="margin-top:50px">
        <h3>Portal dokumentasi dan publikasi makalah Informatika Institut Teknologi Bandung.</h3>
    	</div>
    </div>

    <div class="strip">
      <div class="container">
        <div class="row">
          <div class="span6 full-search-bar">
            <?php $this->load->view('arsip/search') ?>
            <?php echo anchor('arsip/index', 'Telusuri Arsip', array('class'=>'btn btn-small')); ?>
          </div>  
          
          <div class="span6 bookwrap tabs-below">
            <div id="myTabContent" class="tab-content" style="overflow:inherit">
              <div class="tab-pane fade active in" id="baru">
                <?php $this->load->view('home/baru') ?>
              </div>
              <div class="tab-pane fade" id="favorit">
                <?php $this->load->view('home/favorit') ?>
              </div>
              <div class="tab-pane fade" id="populer">
                <?php $this->load->view('home/populer') ?>
              </div>
            </div>
            <ul id="myTab" class="nav nav-tabs bwh stripb">
              <li class="active"><a href="#baru" data-toggle="tab"><i class="icon-refresh"></i> Terbaru</a></li>
              <li><a href="#favorit" data-toggle="tab"><i class="icon-star"></i> Terfavorit</a></li>
              <li><a href="#populer" data-toggle="tab"><i class="icon-thumbs-up"></i> Terpopuler</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="kategori container stripb">
      <div class="span6">
        <div class="row">
          <div class="span3">
            <h4>Kategori</h4>
              <?php $u = new Kategori(); echo $u->getLinks(); ?>
          </div>
          <div class="span3">
            <h4>Mata Kuliah</h4>
              <?php $u = new Matkul(); echo $u->getLinks(); ?>
          </div>
        </div>
        <div class="row" style="margin-top:30px">
          <div class="span3">
            <?php 
              $u = new Buku();
              $c = $u->where('status !=', 0)->count();
              foreach (str_split($c) as $a) {
                echo '<span class="digit">'.$a.'</span>';
              }
             ?>
             <br>Arsip
          </div>
          <div class="span3">
            <?php 
              $u = new Akun();
              $c = $u->where('approved !=', 0)->count();
              foreach (str_split($c) as $a) {
                echo '<span class="digit">'.$a.'</span>';
              }
             ?>
             <br>Penulis
          </div>
        </div>
      </div>
    </div>
