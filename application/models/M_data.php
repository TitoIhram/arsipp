<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_data extends CI_Model
{


	public function detail_data($id = NULL){
		$query = $this->db->get_where('tb_file', array('id' => $id))->row();
		return $query;
	}

	public function show_data()
	{
		return $this->db->get('tb_file');
	}

	public function input_data($data){
		$this->db->insert('tb_file',$data);
	}

	//fungsi untuk mengambil data dari database
	public function get_data($table)
	{
		return $this->db->get($table);
	}

	public function dex_soal($where,$order,$table,$select){
		$this->db->order_by($order);
		$this->db->select($select);
		$query = $this->db->get_where($table, $where);
		return $query;   
	}

	//fungsi untuk mengambil data dari database
	public function get_data_where($where, $table)
	{
		$query = 'SELECT * FROM `'.$table.'` where '.$where;
		return $this->db->query($query);
	}

	//fungsi untuk insert data ke database
	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	//fungsi untuk mengambil data untuk di edit
	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function edit_tim($id){
		$query = 'SELECT * FROM tb_tim JOIN tb_tahun ON tb_tim.id_tahun=tb_tahun.id_tahun WHERE tb_tim.id_tim="' . $id . '"';
		return $this->db->query($query);
	}

	//fungsi untuk mengupdate data di database
	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//fungsi untuk menghapus data
	public function delete_data($where, $table)
	{
		$this->db->delete($table, $where);
	}

	// Fungsi untuk melakukan proses upload file import
	public function insertimport($data)
	{
		$this->db->insert_batch('tb_mahasiswa', $data);
	}

	public function insertbatch($data)
	{
		$this->db->insert_batch($table, $data);
	}

	// Fungsi untuk insert lebih dari 1 data
	public function insert_multiple()
	{
		$durasi_ujian		= $this->input->post('durasi_ujian');
				
		$timer_ujian 		= $durasi_ujian*60;

		$entri = array();
		$count = $this->input->post('id');
		foreach ($count as $i => $value) {
			$entri[] = array(
				'id_mahasiswa' 	=> $this->input->post('id')[$i],
				'id_matapelajaran' => $this->input->post('mapel'),
				'id_jenis_ujian'=> $this->input->post('jenis_ujian'),
				'babak'=> $this->input->post('babak'),
				'tanggal_ujian' => $this->input->post('tanggal'),
				'jam_ujian' 	=> $this->input->post('jam'),
				'durasi_ujian' 	=> $durasi_ujian,
				'timer_ujian' 	=> $timer_ujian,
				'status_ujian' 	=> 1

			);
		}
		//return $entri;
		//echo "<pre>"; print_r($entri); echo "</pre>";die;
		$this->db->insert_batch('tb_peserta', $entri);
		return true;
	}

	public function get_joinsiswa($id)
	{
		$query = 'SELECT * FROM tb_mahasiswa join tb_tim ON tb_mahasiswa.id_tim=tb_tim.id_tim JOIN tb_tahun ON tb_mahasiswa.id_tahun=tb_tahun.id_tahun WHERE tb_mahasiswa.id_mahasiswa="' . $id . '"';
		return $this->db->query($query);
	}
	public function get_akuntim($id)
	{
		$query = 'SELECT * FROM tb_mahasiswa join tb_tahun ON tb_mahasiswa.id_tahun=tb_tahun.id_tahun WHERE tb_mahasiswa.id_mahasiswa="' . $id . '"';
		return $this->db->query($query);
	}

	public function ambil_data(){
		$query = "SELECT tb_tim.*, (SELECT GROUP_CONCAT(tb_mahasiswa.nama_mahasiswa) FROM tb_mahasiswa WHERE tb_mahasiswa.id_tim = tb_tim.id_tim) AS jenenge FROM tb_tim";
		return $this->db->query($query);
	}
	public function tahun(){
		$query = "SELECT * FROM tb_tim JOIN tb_tahun ON tb_tim.id_tahun=tb_tahun.id_tahun";
		return $this->db->query($query);
	}

	public function soal($where, $table)
	{

		$this->db->order_by("RAND ()");
		return $this->db->get_where($table, $where);
	}

	public function insert_jawaban()
	{

		$this->db->insert_batch('tb_jawaban', $entri);
		return true;
	}

	public function UpdateNilai($id_jawaban, $data)
	{
		$this->db->where('id_jawaban', $id_jawaban);
		$this->db->update('tb_jawaban', $data);
	}

	public function UpdateNilai2($id_peserta, $data)
	{
		$this->db->where('id_peserta', $id_peserta);
		$this->db->update('tb_peserta', $data);
	}

	public function get_peserta($id_mahasiswa)
	{
		$this->db->select('*');
		$this->db->from('tb_peserta');
		$this->db->join('tb_matapelajaran', 'tb_peserta.id_matapelajaran=tb_matapelajaran.id_matapelajaran');
		$this->db->join('tb_mahasiswa', 'tb_peserta.id_mahasiswa=tb_mahasiswa.id_mahasiswa');
		$this->db->where('tb_mahasiswa.id_mahasiswa', $id_mahasiswa);
		$query = $this->db->get();
		return $query->result();
	}

	public function importguru($data = array())
	{
		$jumlah = count($data);

		if ($jumlah > 0) {
			$this->db->insert_batch('tb_guru', $data);
		}
	}
}
