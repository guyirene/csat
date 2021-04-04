<?php
namespace Rlc\Csat\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Rlc\Csat\Models\Csat;
use Rlc\Csat\Models\CsatConfig;

class CsatController extends Controller
{

    public function index(Request $request)
    {
      $config           = CsatConfig::where('id',1)->first();
      $data['enabled']  = config('csat.enabled');
      $data['link']     = config('csat.link');
      $data['target']   = config('csat.target');
      $data['class']    = config('csat.class');
      $data['align']    = config('csat.align');
      $data['top']      = config('csat.top');
      $data['minutes']  = config('csat.minutes');
      $data['image']    = config('csat.image');
      $data['alt']      = config('csat.alt');
      $data['height']   = config('csat.height');
      $data['width']    = config('csat.width');
      $data['bgcolor']  = config('csat.bgcolor');
      $data['question'] = config('csat.question');
      $data['message']  = config('csat.message');
      $data['deny']     = config('csat.deny');
      $data['allow']    = config('csat.allow');
      return view('csat::layouts\icon', compact('data'));
    }

    public function store(Request $request)
    {
        $rating = $this->csat_rating($request->rate);
        $page   = Csat::create(['rating' => $rating, 'score' => $request->rate, 'comment' => $request->feedback]);

        return $page;
    }

    public function csat_rating($score)
    {
      $rate = $score;
      switch ($rate) {
        case '1':
          $rate = 'Terrible';
          break;
        case '2':
          $rate = 'Bad';
          break;
        case '3':
          $rate = 'Okay';
          break;
        case '4':
          $rate = 'Good';
          break;
        case '5':
          $rate = 'Excellent';
          break;
        
        default:
          # code...
          break;
      }

      return $rate;
    }

}
