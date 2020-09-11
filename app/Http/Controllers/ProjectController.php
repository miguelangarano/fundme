<?php

namespace App\Http\Controllers;

use Kreait\Firebase\Factory;
use Illuminate\Http\Request;
use DateTime;
use App\Project;

class ProjectController extends Controller
{
    public function createProject(Request $request){
        $factory = (new Factory)->withServiceAccount(__DIR__.'/firebase/firebase.json');
        $database = $factory->createDatabase();
        $fecha = new DateTime();
        $project = new Project($request["name"], $request["description"], $request["expectedIncome"], 0, false, false, $request["videoUrl"], $request["projectPhase"], $request["address"], $request["sriId"], $request["founders"], 0, $fecha->getTimestamp(), $request["mission"], $request["vision"]);
        $reference = $database->getReference('projects')->push()->getKey();
        $project->id = $reference;
        $database->getReference('projects/'.$project->id)->set($project->exportToJson());
        $responseData = new \stdClass();
        $responseData->message = "Proyecto creado con éxito";
        $responseData->code = 0;
        $responseData->body = $reference;
        return json_encode($responseData);
    }

    public function getProject(Request $request){
        $factory = (new Factory)->withServiceAccount(__DIR__.'/firebase/firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('projects/'.$request->projectId);
        $snapshot = $reference->getSnapshot();
        $value = $snapshot->getValue();
        $key = $snapshot->getKey();
        $project = new Project($request["name"], $request["description"], $request["expectedIncome"], $request["currentIncome"], $request["active"], $request["finished"], $request["videoUrl"], $request["projectPhase"], $request["address"], $request["sriId"], $request["founders"], $request["approvalState"], $request["creationDate"], $request["mission"], $request["vision"]);
        $project->id = $key;
        return json_encode($responseData);
    }

    public function getProjects(Request $request){
        $factory = (new Factory)->withServiceAccount(__DIR__.'/firebase/firebase.json');
        $database = $factory->createDatabase();
        $keys = $database->getReference('projects')->getChildKeys();
        //$snapshot = $database->getReference('projects')->orderByChild('active')->equalTo(true)->getSnapshot();
        
        $responseData = [];
        foreach($keys as $key){
            
            $snapshot = $database->getReference('projects/'.strval($key))->getSnapshot();
            $project = ["id"=>$key, "name"=>$snapshot->getValue()["name"], "description"=>$snapshot->getValue()["description"], "expectedIncome"=>$snapshot->getValue()["expectedIncome"], "currentIncome"=>$snapshot->getValue()["currentIncome"], "active"=>$snapshot->getValue()["active"], "finished"=>$snapshot->getValue()["finished"], "videoUrl"=>$snapshot->getValue()["videoUrl"], "projectPhase"=>$snapshot->getValue()["projectPhase"], "address"=>$snapshot->getValue()["address"], "sriId"=>$snapshot->getValue()["sriId"], "founders"=>$snapshot->getValue()["founders"], "approvalState"=>$snapshot->getValue()["approvalState"], "creationDate"=>$snapshot->getValue()["creationDate"], "mission"=>$snapshot->getValue()["mission"], "vision"=>$snapshot->getValue()["vision"]];
            
            array_push($responseData, $project);
        }
        return json_encode($responseData);
    }

    
}
