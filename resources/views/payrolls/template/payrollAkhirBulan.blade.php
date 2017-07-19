  <table class="table table-bordered">
    <tr>
      <td colspan="2"><b>Daftar Penerimaan</b></td>
      <td colspan="5"><b>Daftar Potongan</b></td>
    </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td>Rp. {{number_format($payroll->gapok,0,',','.')}}</td>

      <td>BPJS Kesehatan</td>
      <td></td>

      <td>BTN</td>
      <td><div style="min-width:100px"></div></td>
      <td>Ke x sisa y</td>
    </tr>
    <tr>
      <td>Tunjangan Istri</td>
      <td>Rp. {{number_format($payroll['tunjanganIstri'],0,',','.')}}</td>

      <td>BPJS KT</td>
      <td></td>

      <td>Kendaraan</td>
      <td></td>
      <td>Ke x sisa y</td>
    </tr>
    <tr>
      <td>Tunjangan Anak</td>
      <td>Rp. {{number_format($payroll['tunjanganAnak'],0,',','.')}}</td>

      <td>BPJS Pensiun</td>
      <td></td>

      <td>Kop. Rutin</td>
      <td></td>
      <td>Ke x sisa y</td>
    </tr>
    <tr>
      <td>Natura</td>
      <td>Rp. {{number_format($payroll['natura'],0,',','.')}}</td>

      <td>Dapenma</td>
      <td></td>

      <td>Kop. Perum</td>
      <td></td>
      <td>Ke x sisa y</td>
    </tr>
    <tr>
      <td>Honor</td>
      <td></td>

      <td>Hutang Pegawai</td>
      <td></td>

      <td>Kop. Kredit</td>
      <td></td>
      <td>Ke x sisa y</td>
    </tr>
    <tr>
      <td><b>Sub Total A</b></td>
      <td><b>Rp. {{number_format($payroll->subtotalA,0,',','.')}}</b></td>

      <td>ZIS</td>
      <td></td>

      <td>BJB</td>
      <td></td>
      <td>Ke x sisa y</td>
    </tr>
    <tr>
      <td>Tunjangan Jabatan</td>
      <td>Rp. {{number_format($payroll['tunjanganJabatan'],0,',','.')}}</td>

      <td>Iuran DW</td>
      <td></td>

      <td>Waserda</td>
      <td></td>
      <td>Ke x sisa y</td>

    </tr>
    <tr>
      <td>Tunjangan Kinerja</td>
      <td>Rp. {{number_format($payroll['tunjanganKinerja'],0,',','.')}}</td>

      <td>Iuran Koperasi</td>
      <td></td>
      <td colspan="3" rowspan="6" style="border:none">
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
              <tr>
                <td style="border:none">{{ App\Models\Company::find(1)->officer_name }}</td>
              </tr>
            </table>
          </div>
      </div>
      </td>
    </tr>
    <tr>
      <td>Tunjangan Pelaksana</td>
      <td>Rp. {{number_format($payroll['tunjanganPelaksana'],0,',','.')}}</td>

      <td>Inkop Pamsi</td>
      <td></td>
    </tr>
    <tr>
      <td>Tunjangan Kendaraan</td>
      <td>Rp. {{number_format($payroll['tunjanganKendaraan'],0,',','.')}}</td>

      <td>Lain-lain</td>
      <td></td>
    </tr>
    <tr>
      <td>Pajak</td>
      <td></td>

      <td>PPh 21</td>
      <td></td>
    </tr>
    <tr>
      <td><b>Sub Total B</b></td>
      <td><b>Rp. {{number_format($payroll['subtotalB'],0,',','.')}}</b></td>

      <td><b>Total Potongan</b></td>
      <td></b></td>
    </tr>
    <tr>
      <td><b>Total Penghasilan</b></td>
      <td><b>Rp. {{number_format($payroll->totalPenghasilan,0,',','.')}}</b></td>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td colspan="2"></td>

      <td><b>Gaji Bersih</b></td>
      <td><b>Rp. {{number_format($payroll->gajiBersih,0,',','.')}}</b></td>
    </tr>
  </table>
