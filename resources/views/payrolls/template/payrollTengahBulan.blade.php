<table class="table table-bordered">
  <tr>
    <td colspan="4"><b>Daftar Penerimaan</b></td>
    <td colspan="2"><b>Daftar Potongan</b></td>
  </tr>
  <tr>
    <td>Gaji Pokok</td>
    <td>Rp. {{number_format($payroll->gapok,0,',','.')}}</td>

    <td>Tunjangan Perum</td>
    <td><div style="min-width:100px"></div></td>

    <td>Iuran DW</td>
    <td><div style="min-width:100px"></div></td>
  </tr>
  <tr>
    <td>Tunjangan Istri</td>
    <td></td>

    <td>Tunjangan Kehadiran</td>
    <td></td>

    <td>Tabungan</td>
    <td></td>
  </tr>
  <tr>
    <td>Tunjangan Anak</td>
    <td></td>

    <td>Tunjangan Kendaraan</td>
    <td></td>

    <td>Jamsostek</td>
    <td></td>
  </tr>
  <tr>
    <td>Natura</td>
    <td></td>

    <td colspan="2" rowspan="4"></td>

    <td>Dapenma</td>
    <td></td>
  </tr>
  <tr>
    <td>Honor</td>
    <td></td>

    <td>Iuran YKPP</td>
    <td></td>
  </tr>
  <tr>
    <td>Tunjangan Perusahaan</td>
    <td></td>

    <td colspan="2" rowspan="6">
      <div class="row">
        <div class="col-xs-12">
          <table class="table text-center" style="border:none">
            <tr>
              <td style="border:none">{{ App\Models\Company::find(1)->city }}, {{date("d F Y")}}</td>
            </tr>
            <tr>
              <td style="border:none">{{ App\Models\Company::find(1)->officer_position }}</td>
            </tr>
            <tr>
              <td style="border:none;height:100px;"></td>
            </tr>
            <!--
            <tr>
              <td style="border:none">{{ App\Models\Company::find(1)->officer_name }}</td>
            </tr>
            -->
          </table>
        </div>
    </div>
    </td>
  </tr>
  <tr>
    <td>Tunjangan Jabatan</td>
    <td></td>
  </tr>
  <tr>
    <td> <b>Sub Total</b> </td>
    <td> <b>Rp. {{number_format($payroll->subtotal,0,',','.')}}</b> </td>

    <td> <b>Jumlah Tunjangan</b> </td>
    <td></td>

  </tr>

  <tr>
    <td> <b>Total Penghasilan</b> </td>
    <td>  <b>Rp. {{number_format($payroll->totalPenghasilan,0,',','.')}}</b> </td>
  </tr>
  <tr>
    <td> <b>Total Potongan</b> </td>
    <td></td>
  </tr>
  <tr>
    <td><b>Gaji Bersih</b></td>
    <td><b>Rp. {{number_format($payroll->gajiBersih,0,',','.')}}</b></td>
  </tr>

</table>
