<?php
namespace Register\Model;

use Zend\Db\TableGateway\TableGateway;

class RegisterTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
	public function getEmail($email){
		$rowset = $this->tableGateway->select(array('email' => $email));
		$row = $rowset->current();
		if($row){
			return true;
			}
			return false;
	}
    public function getRegister($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveRegister(Register $register)
    {
        $data = array(
            'firstname' => $register->firstname,
            'lastname'  => $register->lastname,
			'email'  => $register->email,
			'companyname' => $register->companyname,
            'streetaddress'  => $register->streetaddress,
			'citystate'  => $register->citystate,
			'businessphone' => $register->businessphone,
            'inovoiceaddress'  => $register->inovoiceaddress,
        );

        $id = (int)$register->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getRegister($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

}