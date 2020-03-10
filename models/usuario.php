<?php


class usuario
{

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $DB;

    public function __construct()
    {

        $this->DB = database::conexion();
    }

    public function getid()
    {

        return $this->id;
    }

    public function getnombre()
    {

        return $this->nombre;
    }

    public function getapellido()
    {

        return $this->apellido;
    }

    public function getemail()
    {

        return $this->email;
    }

    public function getpassword()
    {

        return password_hash($this->DB->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function getrol()
    {

        return $this->rol;
    }

    public function getimagen()
    {

        return $this->imagen;
    }


    public function setid($id)
    {

        $this->id = $id;
    }

    public function setnombre($nombre)
    {

        $this->nombre = $this->DB->real_escape_string($nombre);
    }

    public function setapellido($apellido)
    {

        $this->apellido = $this->DB->real_escape_string($apellido);
    }

    public function setpassword($password)
    {

        $this->password = $password;
    }

    public function setemail($email)
    {

        $this->email = $this->DB->real_escape_string($email);
    }

    public function setrol($rol)
    {

        $this->rol = $this->DB->real_escape_string($rol);
    }

    public function setimagen($imagen)
    {

        $this->imagen = $imagen;
    }

    public function save()
    {

        $sql = "INSERT INTO usuarios(id,nombre,apellidos,email,password,rol) VALUES(NULL,'{$this->getnombre()}','{$this->getapellido()}','{$this->getemail()}','{$this->getpassword()}','user')";
        $result = $this->DB->query($sql);


        $save = false;
        if ($result) {

            $save = true;
        }

        return $save;
    }

    public function login()
    {

        $session = false;
        $email = $this->email;
        $password = $this->password;

        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $login = $this->DB->query($sql);

        if ($login && $login->num_rows == 1) {

            $usuario = $login->fetch_object();

            //verificar Password
            $verificar = password_verify($password, $usuario->password);

            if ($verificar) {

                $session = $usuario;
            }
        }

        return $session;
    }
}
