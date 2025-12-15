<?php
require_once __DIR__ . '/config.php';

abstract class BaseModel
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $pk = ($this->table === 'Products') ? 'product_id' : 'id';
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE $pk = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $cols = implode(', ', array_keys($data));
        $vals = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO {$this->table} ($cols) VALUES ($vals)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $set = [];
        foreach ($data as $k => $v) $set[] = "$k = :$k";
        $pk = ($this->table === 'Products') ? 'product_id' : 'id';
        $sql = "UPDATE {$this->table} SET " . implode(', ', $set) . " WHERE $pk = :id";
        $stmt = $this->db->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $pk = ($this->table === 'Products') ? 'product_id' : 'id';
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE $pk = ?");
        return $stmt->execute([$id]);
    }
}
?>