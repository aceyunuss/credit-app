<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sales_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function getSales($id = "")
  {

    if (!empty($id)) {
      $this->db->where(['sales_id' => $id]);
    }

    return $this->db->get("sales");
  }

  public function insertSales($input)
  {
    $this->db->insert("sales", $input);
    return $this->db->affected_rows();
  }


  public function updateSales($id, $input)
  {
    $this->db->where(['sales_id' => $id])->update("sales", $input);
    return $this->db->affected_rows();
  }

  public function deleteSales($id)
  {
    $this->db->where("sales_id", $id)->delete("sales");
  }


  public function getSalesRec($id = "")
  {

    if (!empty($id)) {
      $this->db->where(['sales.sales_id' => $id]);
    }

    $this->db->select("sales.*, (select count(s.sales_id) from submission s where s.sales_id=sales.sales_id and s.status='Disetujui') as total, (select coalesce(sum(s.item_price * 1.2), 0) from submission s where s.sales_id=sales.sales_id and s.status='Disetujui') as amount");
    return $this->db->get("sales");
  }


  public function getPeriod($id)
  {
    return $this->db
      ->select("
          CASE
            ( MONTH ( review_date ) ) 
            WHEN 1 THEN
            'Januari' 
            WHEN 2 THEN
            'Februari' 
            WHEN 3 THEN
            'Maret' 
            WHEN 4 THEN
            'April' 
            WHEN 5 THEN
            'Mei' 
            WHEN 6 THEN
            'Juni' 
            WHEN 7 THEN
            'Juli' 
            WHEN 8 THEN
            'Agustus' 
            WHEN 9 THEN
            'September' 
            WHEN 10 THEN
            'Oktober' 
            WHEN 11 THEN
            'November' ELSE 'Desember' 
            END AS period,
            MONTH ( review_date ) as mn,
            YEAR ( review_date ) as yr")
      ->group_by("year(review_date), month(review_date)")
      ->where(['status' => 'Disetujui', 'sales.sales_id' => $id])
      ->join("submission", "submission.sales_id = sales.sales_id", "left")
      ->get("sales");
  }


  public function getOmzMonth($sales_id, $month, $year)
  {
    return $this->db
      ->select("sub_number, item_name, review_date, (item_price*1.2) as item_price")
      ->where([
        'sales.sales_id'      => $sales_id,
        'MONTH(review_date)'  => $month,
        'YEAR(review_date)'   => $year,
        'status'              => 'Disetujui'
      ])
      ->join("sales", "sales.sales_id=submission.sales_id", "left")
      ->get("submission");
  }
}
