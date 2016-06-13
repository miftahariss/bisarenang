<?php

/**
 * Description of acladminmodel
 *
 * @author digit002
 */
class Acladminmodel extends CI_Model {

    private $table = array(
        'user' => 'user',
        'product' => 'product',
        'product_sub' => 'product_sub',
        'product_kategori' => 'product_kategori',
        'product_gallery_foto' => 'product_gallery_foto',
        'blog' => 'blog',
        'safety' => 'safety',
        'program' => 'program',
        'program_level' => 'program_level',
        'article_gallery_foto' => 'article_gallery_foto',
        'slider' => 'slider',
        'store' => 'store',
        'about' => 'about'
    );

    /**
     * show all data event
     * status 1
     * @param type $user
     * @param type $pass
     * @return type
     */

    public function checkLogin($user, $pass) {
        $this->db->select('*');
        $this->db->from($this->table['user']);
        $this->db->where("email = '$user' or name = '$user'");
        $this->db->where('password', $pass);

        return $this->db->get();
    }

    /**
     * Count Record article
     * @param type $status
     * @param $headline = 1
     * @return type
     */
    
    public function countProduct($status) {
        $this->db->select('id');
        $this->db->from($this->table['product']);
        $this->db->where('status', $status);

        $count = $this->db->count_all_results();

        return $count;
    }

    public function countKategori($status) {
        $this->db->select('id');
        $this->db->from($this->table['product_kategori']);
        $this->db->where('status', $status);

        $count = $this->db->count_all_results();

        return $count;
    }

    public function countBlog($status) {
        $this->db->select('id');
        $this->db->from($this->table['blog']);
        $this->db->where('status', $status);

        $count = $this->db->count_all_results();

        return $count;
    }

    public function countSafety($status) {
        $this->db->select('id');
        $this->db->from($this->table['safety']);
        $this->db->where('status', $status);

        $count = $this->db->count_all_results();

        return $count;
    }

    public function countProgram($status) {
        $this->db->select('id');
        $this->db->from($this->table['program']);
        $this->db->where('status', $status);

        $count = $this->db->count_all_results();

        return $count;
    }

    /**
     * Count Record user
     * @param type $status
     * @return type
     */
    public function countUser($status) {
        $this->db->select('id');
        $this->db->from($this->table['user']);
        $this->db->where('status', $status);
        $count = $this->db->count_all_results();

        return $count;
    }

    /**
     * show all data user
     * status 1
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchUser($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['user']);
        $this->db->where('status', 1);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * show all data artikel
     * status 1
     * @param type $headline
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    
    public function fetchProduct($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['product']);
        $this->db->where('status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function fetchProductSub() {
        $this->db->select('*');
        $this->db->from($this->table['product_sub']);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function fetchProductKategori() {
        $this->db->select('*');
        $this->db->from($this->table['product_kategori']);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function fetchKategori($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['product_kategori']);
        $this->db->where('status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function fetchBlog($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['blog']);
        $this->db->where('status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function fetchSafety($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['safety']);
        $this->db->where('status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function fetchProgram($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['program']);
        $this->db->where('status', 1);

        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function fetchProgramArtikel($id) {
        $this->db->select('*');
        $this->db->from($this->table['program_level']);
        $this->db->where('id_program', $id);
        $this->db->where('status', 1);
        $this->db->order_by('level', 'asc');
        $query = $this->db->get();

        return $query->result();
    }

    public function fetchSlider(){
        $this->db->select('*');
        $this->db->from($this->table['slider']);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'DESC');

        //$this->db->limit($limit, $start);
        //$this->db->order_by('profil.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function fetchStore(){
        $this->db->select('*');
        $this->db->from($this->table['store']);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'DESC');

        //$this->db->limit($limit, $start);
        //$this->db->order_by('profil.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    public function fetchAbout(){
        $this->db->select('*');
        $this->db->from($this->table['about']);
        $this->db->where('status', 1);
        $this->db->order_by('id', 'DESC');

        //$this->db->limit($limit, $start);
        //$this->db->order_by('profil.id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * fetchall photo
     * @param type $limit
     * @param type $start
     * @return type array
     */
    public function fetchGalleryPhoto($limit, $start) {
        $this->db->select('*');
        $this->db->from($this->table['album']);
        $this->db->where('status', 1);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * show all data user
     * status 0
     * @param type $limit
     * @param type $start
     * @return boolean
     */
    public function fetchArchiveUser($limit, $start) {
        $data = array();
        $this->db->select('*');
        $this->db->from($this->table['user']);
        $this->db->where('status', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    /**
     * show all data archive gallery album
     * @return multitype:unknown |boolean
     */
    public function fetchArchiveGallery($limit, $start) {
        $data = array();
        $this->db->select('*');
        $this->db->from($this->table['album']);
        $this->db->where('status', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

            return $data;
        }

        return false;
    }

    /**
     * save article
     * @param type $data
     */
    
    public function addProduct($data) {
        $this->db->insert($this->table['product'], $data);

        return $this->db->insert_id();
    }

    public function addKategori($data) {
        $this->db->insert($this->table['product_kategori'], $data);

        return $this->db->insert_id();
    }

    public function addBlog($data) {
        $this->db->insert($this->table['blog'], $data);

        return $this->db->insert_id();
    }

    public function addSafety($data) {
        $this->db->insert($this->table['safety'], $data);

        return $this->db->insert_id();
    }

    public function addProgram($data) {
        $this->db->insert($this->table['program'], $data);

        return $this->db->insert_id();
    }

    public function addProgramArtikel($data) {
        $this->db->insert($this->table['program_level'], $data);

        return $this->db->insert_id();
    }

    public function addProgramLevel($data1, $data2, $data3) {
        $this->db->insert($this->table['program_level'], $data1);
        $this->db->insert($this->table['program_level'], $data2);
        $this->db->insert($this->table['program_level'], $data3);

        return TRUE;
    }

    public function addGalleryProduct($format_upload, $id_product) {
        if (count($format_upload) > 0 && $format_upload != "") {
            // table gallery
            $title_photo = $this->input->post('title_photo');
            $desc_photo  = $this->input->post('desc_photo');
            $filename    = $format_upload;

            foreach ($title_photo as $key => $title) {
                $photo = array(
                    'title'        => $title,
                    'body'         => $desc_photo[$key],
                    'filename'     => $filename[$key], //from method upload
                    'id_product'   => $id_product,
                    'created_date' => time(),
                    'status'       => 1,
                );
                $this->db->insert($this->table['product_gallery_foto'], $photo);
            }
            //return true;
        }
    }

    public function addGalleryArticle($format_upload, $id_article) {
        if (count($format_upload) > 0 && $format_upload != "") {
            // table gallery
            $title_photo = $this->input->post('title_photo');
            $desc_photo  = $this->input->post('desc_photo');
            $filename    = $format_upload;

            foreach ($title_photo as $key => $title) {
                $photo = array(
                    'title'        => $title,
                    'body'         => $desc_photo[$key],
                    'filename'     => $filename[$key], //from method upload
                    'id_article'   => $id_article,
                    'created_date' => time(),
                    'status'       => 1,
                );
                $this->db->insert($this->table['article_gallery_foto'], $photo);
            }
            //return true;
        }
    }

    public function addSlider($data) {
        $this->db->insert($this->table['slider'], $data);

        return $this->db->insert_id();
    }

    /**
     * save Gallery photo
     * @param type $data
     */
    public function addGallery($format_upload) {
        // table photo_album
        $album = array(
            'title'             => $this->input->post('title'),
            'body'              => $this->input->post('body'),
            'meta_keywords	' => $this->input->post('meta_keywords'),
            'meta_description'  => $this->input->post('meta_description'),
            'created_date'      => time(),
            'status'            => 1,
        );
        $this->db->insert($this->table['album'], $album);
        $id = $this->db->insert_id();

        // table photo
        $title_photo = $this->input->post('title_photo');
        $desc_photo  = $this->input->post('desc_photo');
        $filename    = $format_upload;

        foreach ($title_photo as $key => $title) {
            $photo = array(
                'title'        => $title,
                'body'         => $desc_photo[$key],
                'filename'     => $filename[$key], //from method upload
                'id_album'     => $id,
                'created_date' => time(),
                'status'       => 1,
            );
            $this->db->insert($this->table['gallery'], $photo);
        }
        //return true;
    }

    /**
     * update Gallery photo
     * @param type $data
     */
    public function updateGallery($format_upload) {
        // table photo_album
        $data_album = array(
            'title'            => $this->input->post('title'),
            'body'             => $this->input->post('body'),
            'meta_keywords'    => $this->input->post('meta_keywords'),
            'meta_description' => $this->input->post('meta_description')
        );
        $id_album   = $this->input->post('id_album');
        $this->db->where('id', $id_album);
        $this->db->update($this->table['album'], $data_album);

        if (count($format_upload) > 0 && $format_upload != "") {
            // table photo
            $title_photo = $this->input->post('title_photo');
            $desc_photo  = $this->input->post('desc_photo');
            $filename    = $format_upload;
            $id_photo    = $this->input->post('id_album');

            foreach ($title_photo as $key => $title) {
                $photo = array(
                    'title'        => $title,
                    'body'         => $desc_photo[$key],
                    'filename'     => $filename[$key], //from method upload
                    'id_album'     => $id_photo,
                    'created_date' => time(),
                    'status'       => 1,
                );
                $this->db->insert($this->table['gallery'], $photo);
            }
        }
    }

    /**
     * Update article
     * @param type $data
     * @param type $id
     */
    
    public function updateProduct($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['product'], $data);
    }

    public function updateProductGalleryFoto($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['product_gallery_foto'], $data);
    }

    public function updateKategori($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['product_kategori'], $data);
    }

    public function updateBlog($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['blog'], $data);
    }

    public function updateSafety($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['safety'], $data);
    }

    public function updateProgram($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['program'], $data);
    }

    public function updateProgramArtikel($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['program_level'], $data);
    }

    public function updateProgramLevel($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['program_level'], $data);
    }

    public function updateArticleGalleryFoto($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['article_gallery_foto'], $data);
    }

    public function updateSlider($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['slider'], $data);
    }

    public function updateStore($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['store'], $data);
    }

    public function updateAbout($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['about'], $data);
    }

    /**
     * Update gallery photo
     * @param type $data
     * @param type $id
     */
    public function updateGalleryPhoto($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['album'], $data);
    }

    /**
     * Update user
     * @param type $data
     * @param type $id
     */
    public function updateUser($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['user'], $data);
    }

    /**
     * Check password
     * @param type $password
     * @return boolean
     */
    public function checkPassword($password) {
        $id = $this->session->userdata('user_id');
        $q  = $this->db->get_where($this->table['user'], array('id' => $id, 'password' => sha1(md5($password))));
        if ($q->num_rows == 1) {
            return true;
        }

        return false;
    }

    /**
     * delete article. change status 1 to 0
     * @param type $data
     * @param type $id
     */
    
    public function deleteProduct($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['product'], $data);
    }

    public function deleteBlog($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['blog'], $data);
    }

    public function deleteSafety($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['safety'], $data);
    }

    public function deleteProgramArtikel($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['program_level'], $data);
    }

    public function deleteProductGalleryFoto($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table['product_gallery_foto'], $data);
    }

    public function deleteArticleGalleryFoto($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table['article_gallery_foto'], $data);
    }

    public function deleteKategori($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['product_kategori'], $data);
    }

    public function deleteSlider($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['slider'], $data);
    }

    /**
     * delete photo. change status 1 to 0
     * @param type $data
     * @param type $id
     */
    public function deleteGalleryPhoto($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['gallery'], $data);
    }

    /**
     * change status 1 to 0
     * @param type $data
     * @param type $id
     */
    public function deleteUser($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['user'], $data);
    }

    /**
     * save user
     * @param type $data
     */
    public function addUser($data) {
        $this->db->insert($this->table['user'], $data);
    }

    /**
     * Get row id article
     * @param type $id
     * @return type array
     */
    
    public function getIdProduct($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['product']);

        return $query->row();
    }

    public function getIdProductSub($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['product_sub']);

        return $query->row();
    }

    public function getIdBlog($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['blog']);

        return $query->row();
    }

    public function getIdSafety($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['safety']);

        return $query->row();
    }

    public function getIdProgram($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['program']);

        return $query->row();
    }

    public function getIdProgramArtikel($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['program_level']);

        return $query->row();
    }

    public function getIdProgramLevel($id, $level) {
        $this->db->where('id_program', $id);
        $this->db->where('level', $level);
        $query = $this->db->get($this->table['program_level']);

        return $query->row();
    }

    public function getIdGalleryProduct($id) {
        $this->db->select('*');
        $this->db->from($this->table['product_gallery_foto']);
        $this->db->where('id_product', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function getIdGalleryArticle($id) {
        $this->db->select('*');
        $this->db->from($this->table['article_gallery_foto']);
        $this->db->where('id_article', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function getIdProductGalleryFoto($id) {
        $this->db->select('*');
        $this->db->from($this->table['product_gallery_foto']);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function getIdArticleGalleryFoto($id) {
        $this->db->select('*');
        $this->db->from($this->table['article_gallery_foto']);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    public function getIdKategori($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['product_kategori']);

        return $query->row();
    }

    public function getIdSlider($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['slider']);

        return $query->row();
    }

    public function getIdStore($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['store']);

        return $query->row();
    }

    public function getIdAbout($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['about']);

        return $query->row();
    }

    /**
     * Get row id
     * @param type $id
     * @return type array
     */
    public function getIdGalleryAlbum($id) {
        $this->db->select('*');
        $this->db->from($this->table['album']);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * Get row id
     * @param type $id
     * @return type array
     */
    public function getIdGalleryPhoto($id) {
        $this->db->select('*');
        $this->db->from($this->table['gallery']);
        $this->db->where('id_album', $id);
        $this->db->where('status', 1);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * Get row id user
     * @param type $id
     * @return type array
     */
    public function getIdUser($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table['user']);

        return $query->row();
    }

    /**
     * Active user. change status 0 to 1
     * @param type $data
     * @param type $id
     */
    public function activeUser($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table['user'], $data);
    }

    /**
     * search news
     * @param type $term
     * @return type array
     */
    
    public function search_product($term) {
        $data = array();
        $this->db->select('id, title, filename, created_date, modified_date, status,');
        $this->db->from($this->table['product']);
        $this->db->where('status', 1);
        $this->db->like('title', $term);
        $this->db->or_like('filename', $term);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        $query->free_result();

        return $data;
    }

    public function checkUsernameExist($name, $id = false) {
        $this->db->select('id');
        $this->db->from($this->table['user']);
        $this->db->where('name', $name);
        $this->db->where('status', 1);

        if ($id)
            $this->db->where('id !=', $id);

        return $this->db->get();
    }

    public function checkEmailExist($email, $id = false) {
        $this->db->select('id');
        $this->db->from($this->table['user']);
        $this->db->where('email', $email);
        $this->db->where('status', 1);

        if ($id)
            $this->db->where('id !=', $id);

        return $this->db->get();
    }
}