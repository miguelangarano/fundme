<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Project extends Model{
    public $id;
    public $name;
    public $description;
    public $expectedIncome;
    public $currentIncome;
    public $active;
    public $finished;
    public $videoUrl;
    public $projectPhase;
    public $address;
    public $sriId;
    public $founders;
    public $approvalState;
    public $creationDate;

    public function __construct($name, $description, $expectedIncome, $currentIncome, $active, $finished, $videoUrl, $projectPhase, $address, $sriId, $founders, $approvalState, $creationDate) {
        $this->name = $name;
        $this->description = $description;
        $this->expectedIncome = $expectedIncome;
        $this->currentIncome = $currentIncome;
        $this->active = $active;
        $this->finished = $finished;
        $this->videoUrl = $videoUrl;
        $this->projectPhase = $projectPhase;
        $this->address = $address;
        $this->sriId = $sriId;
        $this->founders = $founders;
        $this->approvalState = $approvalState;
        $this->creationDate = $creationDate;
    }

    public function exportToJson(){
        $project = new \stdClass();
        $project->name = $this->name;
        $project->description = $this->description;
        $project->expectedIncome = $this->expectedIncome;
        $project->currentIncome = $this->currentIncome;
        $project->active = $this->active;
        $project->finished = $this->finished;
        $project->videoUrl = $this->videoUrl;
        $project->projectPhase = $this->projectPhase;
        $project->address = $this->address;
        $project->sriId = $this->sriId;
        $project->founders = $this->founders;
        $project->approvalState = $this->approvalState;
        $project->creationDate = $this->creationDate;
        return $project;
    }
}

?>