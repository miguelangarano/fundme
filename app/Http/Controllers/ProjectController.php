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
        $reference = $database->getReference('projects');
        $snapshot = $reference->getSnapshot();
        $keys = $reference->getChildKeys();
        $responseData = [];
        foreach($keys as $key){
            $project = new Project($snapshot[$key]["name"], $snapshot[$key]["description"], $snapshot[$key]["expectedIncome"], $snapshot[$key]["currentIncome"], $snapshot[$key]["active"], $snapshot[$key]["finished"], $snapshot[$key]["videoUrl"], $snapshot[$key]["projectPhase"], $snapshot[$key]["address"], $snapshot[$key]["sriId"], $snapshot[$key]["founders"], $snapshot[$key]["approvalState"], $snapshot[$key]["creationDate"], $snapshot[$key]["mission"], $snapshot[$key]["vision"]);
            $project->id = $key;
            array_push($responseData, $project);
        }
        return json_encode($responseData);
    }

    
}
