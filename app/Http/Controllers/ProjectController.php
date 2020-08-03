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
        $project = new Project($request["name"], $request["description"], $request["expectedIncome"], 0, false, false, $request["videoUrl"], $request["projectPhase"], $request["address"], $request["sriId"], $request["founders"], 0, $fecha->getTimestamp());
        $reference = $database->getReference('projects')->push()->getKey();
        $project->id = $reference;
        $database->getReference('projects')->set($project->exportToJson());
        $responseData = new \stdClass();
        $responseData->message = "Proyecto creado con éxito";
        $responseData->code = 0;
        $responseData->body = $reference;
        return json_encode($responseData);
    }
}
