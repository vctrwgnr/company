<?php

class Employee implements IBasic
{
    /**
     * @var int|null
     */
    private int|null $id;
    /**
     * @var string|null
     */
    private string|null $firstName;
    /**
     * @var string|null
     */
    private string|null $lastName;

    /**
     * @var string|null
     */
    private string|null $gender;
    /**
     * @var float|null
     */
    private float|null $salary;

    /**
     * @param int|null $id
     * @param string|null $firstName
     * @param string|null $lastName
     * @param string|null $gender
     * @param float|null $salary
     */
    public function __construct(int $id = null, string $firstName = null, string $lastName = null, string $gender = null, float $salary = null)
    {
        //if ($id !== null || $gender !== null || $salary !== null) {
        if ($id !== null) {
            $this->id = $id;
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->gender = $gender;
            $this->salary = $salary;
        }
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @return Employee[]
     */
    public function getAllAsObjects(): array
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM employee';
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Employee');
    }

    /**
     * @param int $id
     * @return void
     */
    public function deleteObjectById(int $id): void
    {
        $pdo = Db::getConnection();
        $sql = 'DELETE FROM employee WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
    }

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $gender
     * @param float $salary
     * @return Employee
     */
    public function insert(string $firstName,
                           string $lastName,
                           string $gender,
                           float  $salary): Employee
    {
        try {
            $pdo = Db::getConnection();
            $sql = 'INSERT INTO employee VALUES(NULL,?,?,?,?)';
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$firstName, $lastName, $gender, $salary]);
            $id = $pdo->lastInsertId();
            return new Employee($id, $firstName, $lastName, $gender, $salary);
        } catch (Exception $e) {
            throw new Exception($e);

        }
    }

    /**
     * @param int $id
     * @return Employee
     */
    public function getObjectById(int $id): Employee
    {
        $pdo = Db::getConnection();
        $sql = 'SELECT * FROM employee WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetchObject('Employee');
    }

    /**
     * @return void
     */
    public function update(): void
    {
        $pdo = Db::getConnection();
        $sql = 'UPDATE employee SET firstName=?, lastName=?, gender=?, salary=? WHERE id=?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$this->firstName, $this->lastName, $this->gender, $this->salary, $this->id]);
    }

    public function getName(): string
    {
        return ($this->getFirstName() . ' ' . $this->getLastName());
    }

    public function getPulldownMenu($rental = null): string
    {
        $employees = $this->getAllAsObjects();
        $html = '<select name="employeeId">';
        foreach ($employees as $e) {
            $selected = '';
            if (isset($rental)) {
                $selected = ($e->getId() === $rental->getEmployeeId()) ? ' selected' : '';
            }
            $html .= '<option value="' . $e->getId() . '"' . $selected . '>' . $e->getName() . '</option>';
        }
        $html .= '</select>';

        return $html;
    }

}