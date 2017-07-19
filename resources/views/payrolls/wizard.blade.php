@extends('dashboard')

@section('content')

<style>
.setup-content .jumbotron {
    border-radius: 20px;
}
.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
</style>

<div class="row">
    <div class="col-md-12">
        <h1>Wizard / Panduan Payroll</h1>
    </div>
</div>

<br />

<div class="row">
  <div class="col-md-12">

  <div class="stepwizard col-md-offset-3">
      <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
          <a href="#step-1" type="button" class="btn btn-primary btn-circle disable">1</a>
          <p>Update Data</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-2" type="button" class="btn btn-default btn-circle disable" disabled="disabled">2</a>
          <p>Generate Slip</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-3" type="button" class="btn btn-default btn-circle disable" disabled="disabled">3</a>
          <p>Approval / Penerbitan Slip</p>
        </div>
        <div class="stepwizard-step">
          <a href="#step-4" type="button" class="btn btn-default btn-circle disable" disabled="disabled">4</a>
          <p>Print / Cetak Slip</p>
        </div>
      </div>
  </div>

  @if ($user=Auth::user())
  <div class="row setup-content" id="step-1">
    <div class="col-xs-6 col-md-offset-3 jumbotron" style="background:#0f69d7; color:#fff;" >
      @if (in_array($user->roles->first()->name, ['admin']))
      <div class="row">
        <div class="col-md-4">
          <img src="img/payrollwizard1.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-8">
          <p>Adakah perubahan data sejak bulan lalu?</p>
          <span style="color:#bbd9ff;">Sebelum menggenerate payroll, pastikan Data Pegawai dan Data Referensi sudah update.<br /><br />
          </span>
        </div>
      </div>
      <div class="row panel-body megamenu">
        <div class="col-md-6">
          <a style="color:#fff;" href="{!! url('/admin/users') !!}"><span class="fa fa-user"></span> Data Pegawai</a>
          <a style="color:#fff;" href="{!! url('/pangkats') !!}"><span class="fa fa-star"></span> Pangkat (Golongan)</a>
          <a style="color:#fff;" href="{!! url('/jabatans') !!}"><span class="fa fa-star"></span> Jabatan</a>
          <a style="color:#fff;" href="{!! url('/bagians') !!}"><span class="fa fa-building"></span> Bagian (Unit)</a>
        </div>
        <div class="col-md-6">
          <a style="color:#fff;" href="{!! url('/wilayahs') !!}"><span class="fa fa-map-marker"></span> Wilayah</a>
          <a style="color:#fff;" href="{!! url('/statuspegawais') !!}"><span class="fa fa-legal"></span> Status Pegawai</a>
          <a style="color:#fff;" href="{!! url('/statuskerjas') !!}"><span class="fa fa-flag"></span> Status Kerja</a>
          <a style="color:#fff;" href="{!! url('/gajipokoks') !!}"><span class="fa fa-money"></span> Gaji Pokok</a>
        </div>
      </div>
      @endif
      @if (in_array($user->roles->first()->name, ['manajer']))
      <div class="row">
        <div class="col-md-4">
          <img src="img/payrollwizard1.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-8">
          <p>Anda manajemen, bukan operator atau admin.</p>
          <span style="color:#bbd9ff;">Tahap/fungsi penggajian anda ada di tahap approval. Silakan lanjut ke tahap berikutnya.<br /><br />
        </div>
      </div>
      @endif
      <button id="tostep2" name="tostep2" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
    </div>
  </div>
  <div class="row setup-content" id="step-2">
    <div class="col-xs-6 col-md-offset-3 jumbotron" style="background:#0f69d7; color:#fff;" >
      @if (in_array($user->roles->first()->name, ['admin']))
      @if (app('request')->input('status')=='generated')
      <div class="row">
        <div class="col-md-4">
          <img src="img/payrollwizard2.png" class="img-responsive" alt="">
        </div>
        <div class="col-md-8">
          <p>Telah berhasil menggenerate sejumlah {{ app('request')->input('total') }} slip.</p>
          <span style="color:#bbd9ff;">Selanjutnya slip menunggu tahap approval dari manajemen agar bisa dicetak.<br /><br />
          </span>
        </div>
      </div>
      <div class="row">
        <button id="tostep3" name="tostep3" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
      </div>
      @else
      <div class="col-md-12">
        {!! Form::open(['route' => 'generatePayroll', 'method' => 'post']) !!}
        <div class="row">
          <div class="col-md-4">
            <img src="img/payrollwizard2.png" class="img-responsive" alt="">
          </div>
          <div class="col-md-8">
            <p>Harap entry tanggal dengan lengkap.</p>
            <span style="color:#bbd9ff;">Slip akan digenerate untuk seluruh karyawan aktif.<br /><br />
            </span>
          </div>
        </div>
        <br />
        <div class="form-group">
          <div class="col-md-6" style="padding:0">
            <label for="fromDate">Tanggal Awal Kalkulasi</label>
            <input type="date" name="fromDate" class="form-control" required="required" required>
          </div>
          <div class="col-md-6" style="padding:0 10px">
            <label for="fromDate">Tanggal Akhir Kalkulasi</label>
            <input type="date" name="toDate" class="form-control" required="required" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label">Judul Slip</label>
          <input maxlength="200" type="text" name="name" class="form-control" placeholder="Misal: 'Gaji Juli 2017' atau 'Tunjangan Juli 2017'"  />
        </div>
        <div class="form-group pull-right">
          <button class="btn btn-danger" name="phase" value="1" onclick='return confirm("Generate payroll?")'>Generate Slip Gaji</button>
          <button class="btn btn-danger" name="phase" value="2" onclick'=return confirm("Generate payroll?")'>Generate Slip Tunjangan</button>
        </div>
        <div class="row">
          <button id="tostep3" name="tostep3" class="btn btn-primary nextBtn btn-lg pull-right" type="button" style="display:none;">Next</button>
        </div>
        {!! Form::close() !!}

      </div>
      @endif
      @endif

      @if (in_array($user->roles->first()->name, ['manajer']))
        <div class="row">
          <div class="col-md-4">
            <img src="img/payrollwizard2.png" class="img-responsive" alt="">
          </div>
          <div class="col-md-8">
            <p>Anda manajemen, bukan operator atau admin.</p>
            <span style="color:#bbd9ff;">Tahap/fungsi penggajian anda ada di tahap approval. Silakan lanjut ke tahap berikutnya.<br /><br />
            </span>
          </div>
        </div>
        <button id="tostep3" name="tostep3" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
      @endif
    </div>
  </div>
  <div class="row setup-content" id="step-3">
    <div class="col-xs-6 col-md-offset-3 jumbotron" style="background:#0f69d7; color:#fff;" >
      <div class="col-md-12">
        @if (in_array($user->roles->first()->name, ['admin']))
          <div class="row">
            <div class="col-md-4">
              <img src="img/payrollwizard3.png" class="img-responsive" alt="">
            </div>
            <div class="col-md-8">
              <p>Tidak memiliki hak akses approval payroll.</p>
              <span style="color:#bbd9ff;">Anda hanya bisa menggenerate payroll atau mencetak slip-slip terdahulu yang telah diapprove oleh manajemen.<br /><br />
              </span>
            </div>
          </div>
        @endif
        @if (in_array($user->roles->first()->name, ['manajer']))
        <div class="row">
          <div class="col-md-4">
            <img src="img/payrollwizard3.png" class="img-responsive" alt="">
          </div>
          <div class="col-md-8">
            <p>Review, lalu approve atau tolak/hapus.</p>
            <span style="color:#bbd9ff;">Berikut ini adalah slip-slip yang sudah digenerate dan belum diapprove/diterbitkan:<br /><br />
          </div>
        </div>
        <div class="row panel-body megamenu">
        @foreach ($unapproveds as $key => $unapproved)
          <div style="color:#fff; font-size:14px; padding:5px;">{{ ++$key }}. {{ $unapproved->title }} ( {{ $unapproved->total }} slip )<br />
          <form style="display:inline;" method="get" action="{!! route('payrollwizardreviews',['title'=>$unapproved->title]) !!}">
              {!! csrf_field() !!}
              <input type="hidden" name="title" value="{{ $unapproved->title }}" />
              <button class="btn btn-warning btn-xs" style="border:0; padding:0 5px; display:inline;" type="submit"><i class="fa fa-search"></i>View</button>
          </form>
          <form style="display:inline;" method="post" action="{!! route('payrollwizardapproves') !!}">
              {!! csrf_field() !!}
              <input type="hidden" name="title" value="{{ $unapproved->title }}" />
              <button class="btn btn-info btn-xs" style="border:0; padding:0 5px; display:inline;" type="submit" onclick="return confirm('Approve seluruh slip?')"><i class="fa fa-check"></i>Approve</button>
          </form>
          <form style="display:inline;" method="post" action="{!! route('payrollwizardrejects') !!}">
              {!! csrf_field() !!}
              <input type="hidden" name="title" value="{{ $unapproved->title }}" />
              <button class="btn btn-danger btn-xs" style="border:0; padding:0 5px; display:inline;" type="submit" onclick="return confirm('Reject dan/lalu delete?')"><i class="fa fa-trash"></i>Reject</button>
          </form>
          </div>
        @endforeach
        </div>
        @endif
        <button id="tostep4" name="tostep4" class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
      </div>
    </div>
  </div>
  <div class="row setup-content" id="step-4">
    <div class="col-xs-6 col-md-offset-3 jumbotron" style="background:#0f69d7; color:#fff;" >
      <div class="col-md-12">
        @if (in_array($user->roles->first()->name, ['admin']))
        <div class="row">
          <div class="col-md-4">
            <img src="img/payrollwizard4.png" class="img-responsive" alt="">
          </div>
          <div class="col-md-8">
            <p>Mencetak slip gaji atau slip tunjangan</p>
            <span style="color:#bbd9ff;">Untuk mencetak dapat dilakukan di halaman-halaman berikut:<br /><br />
            </span>
            <div class="row panel-body megamenu">
              <a style="color:#fff;" href="{!! url('/payrolls') !!}"><span class="fa fa-print"></span> Print Slip Gaji Bulanan</a>
              <a style="color:#fff;" href="{!! url('/payrolls') !!}"><span class="fa fa-print"></span> Print Slip Tunjangan Bulanan</a>
            </div>
          </div>
        @endif
        @if (in_array($user->roles->first()->name, ['manajer']))
        <div class="row">
          <div class="col-md-4">
            <img src="img/payrollwizard4.png" class="img-responsive" alt="">
          </div>
          <div class="col-md-8">
            <p>Anda manajemen, bukan operator atau admin.</p>
            <span style="color:#bbd9ff;">Tahap/fungsi penggajian anda ada di tahap approval.<br /><br />
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  @endif


  </div>
</div>

@stop

@section('javascript')
<script type="text/javascript">

$(document).ready(function () {
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
  $({{ app('request')->input('button') }}).trigger('click');
});
</script>
@endsection
