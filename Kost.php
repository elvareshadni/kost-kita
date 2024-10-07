class Item
{

    function addNewKamarKost()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('namaKost','namaKost','trim|required|max_length[50]');
            $this->form_validation->set_rules('harga','harga','trim|required|numeric');
            $this->form_validation->set_rules('alamat','alamat','trim|required|max_length[50]');
                        
            $itemInfo = array('namaKost'=>$this->input->post("namaKost"),
                            'harga'=>$this->input->post("harga"),
                            'alamat'=>$this->input->post("alamat"));
            $result = $this->item->addNewItem($itemInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('sukses', 'Data baru berhasil dibuat');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Data gagal dibuat');
                }
                
                redirect('item');
            
        }
    }
}
