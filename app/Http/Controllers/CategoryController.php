<?php
namespace CorpseFinder\Http\Controllers;
use CorpseFinder\Deceased;
use Illuminate\Http\Request;
use CorpseFinder\Http\Requests;
use CorpseFinder\Http\Controllers\Controller;
class CategoryController extends Controller
{
/*
THE BELOW FUNCTIONS DISPLAY INDIVIDUAL CATEGORY HYMNS
*/

//DISPLAY ENTRANCE HYMNS
public function getEntranceHymns()
{
$hymns        = Hymn::where('category','=', 'Entrance')->get();
$hymn_title   = 'Entrance Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY MASS HYMNS
public function getMassHymns()
{
$hymns        = Hymn::where('category','=', 'Mass')->get();
$hymn_title   = 'Mass Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY BIBLE PROCESSION HYMNS
public function getBibleProcessionHymns()
{
$hymns        = Hymn::where('category','=', 'Bible Procession')->get();
$hymn_title   = 'Bible Procession Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY OFFERTORY HYMNS
public function getOffertoryHymns()
{
$hymns        = Hymn::where('category','=', 'Offertory')->get();
$hymn_title   = 'Offertory Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY PEACE HYMNS
public function getPeaceHymns()
{
$hymns        = Hymn::where('category','=', 'Peace')->get();
$hymn_title   = 'Peace Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY COMMUNION HYMNS
public function getCommunionHymns()
{
$hymns        = Hymn::where('category','=', 'Communion')->get();
$hymn_title   = 'Communion Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY THANKSGIVING HYMNS
public function getThanksgivingHymns()
{
$hymns        = Hymn::where('category','=', 'Thanksgiving')->get();
$hymn_title   = 'Thanksgiving Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY ADVENT HYMNS
public function getAdventHymns()
{
$hymns        = Hymn::where('category','=', 'Advent')->get();
$hymn_title   = 'Advent Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY LENT HYMNS
public function getLentHymns()
{
$hymns        = Hymn::where('category','=', 'Lent')->get();
$hymn_title   = 'Lent Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY CHRISTMAS HYMNS
public function getChristmasHymns()
{
$hymns        = Hymn::where('category','=', 'Christmas')->get();
$hymn_title   = 'Christmas Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY PENTECOST HYMNS
public function getPentecostHymns()
{
$hymns        = Hymn::where('category','=', 'Pentecost')->get();
$hymn_title   = 'Pentecost Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY EPIPHANY HYMNS
public function getEpiphanyHymns()
{
$hymns        = Hymn::where('category','=', 'Epiphany')->get();
$hymn_title   = 'Epiphany Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY PALM SUNDAY HYMNS
public function getPalmSundayHymns()
{
$hymns        = Hymn::where('category','=', 'Palm Sunday')->get();
$hymn_title   = 'Palm Sunday Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY ASCENSION HYMNS
public function getAscensionHymns()
{
$hymns        = Hymn::where('category','=', 'Ascension')->get();
$hymn_title   = 'Ascension Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY BAPTISM HYMNS
public function getBaptismHymns()
{
$hymns        = Hymn::where('category','=', 'Baptism')->get();
$hymn_title   = 'Baptism Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY MARRIAGE HYMNS
public function getMarriageHymns()
{
$hymns        = Hymn::where('category','=', 'Marriage')->get();
$hymn_title   = 'Marriage Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY FUNERAL HYMNS
public function getFuneralHymns()
{
$hymns        = Hymn::where('category','=', 'Funeral')->get();
$hymn_title   = 'Funeral Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY PRAISE AND WORSHIP HYMNS
public function getPraiseAndWorshipHymns()
{
$hymns        = Hymn::where('category','=', 'Praise and Worship')->get();
$hymn_title   = 'Praise and Worship Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY EXIT HYMNS
public function getExitHymns()
{
$hymns        = Hymn::where('category','=', 'Exit')->get();
$hymn_title   = 'Exit Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY HOLY WEEK HYMNS
public function getHolyWeekHymns()
{
$hymns        = Hymn::where('category','=', 'Holy Week')->get();
$hymn_title   = 'Holy Week Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY HOLY WEEK HYMNS
public function getEasterHymns()
{
$hymns        = Hymn::where('category','=', 'Easter')->get();
$hymn_title   = 'Easter Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY MOTHER MARY HYMNS
public function getMarianHymns()
{
$hymns        = Hymn::where('category','=', 'Marian')->get();
$hymn_title   = 'Marian Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY MOTHER MARY HYMNS
public function getHolyTrinityHymns()
{
$hymns        = Hymn::where('category','=', 'Holy Trinity')->get();
$hymn_title   = 'Holy Trinity Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY CHRIST THE KING HYMNS
public function getChristTheKingHymns()
{
$hymns        = Hymn::where('category','=', 'Christ The King')->get();
$hymn_title   = 'Christ The King Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY SAINTS HYMNS
public function getSaintsHymns()
{
$hymns        = Hymn::where('category','=', 'Saints')->get();
$hymn_title   = 'Saints Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY FORGIVENESS HYMNS
public function getForgivenessHymns()
{
$hymns        = Hymn::where('category','=', 'Forgiveness')->get();
$hymn_title   = 'Forgiveness Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY DISCIPLESHIP HYMNS
public function getDiscipleshipHymns()
{
$hymns        = Hymn::where('category','=', 'Discipleship')->get();
$hymn_title   = 'Discipleship Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY SACRED HEART HYMNS
public function getSacredHeartHymns()
{
$hymns        = Hymn::where('category','=', 'Sacred Heart')->get();
$hymn_title   = 'Sacred Heart Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY ADDEDUM HYMNS
public function getAddedumHymns()
{
$hymns        = Hymn::where('category','=', 'Addedum')->get();
$hymn_title   = 'Addedum Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
//DISPLAY OTHER HYMNS
public function getOtherHymns()
{
$hymns        = Hymn::where('category','=', 'Other')->get();
$hymn_title   = 'Other Hymns';

return view('layouts.main.all-hymns', compact('hymn_title','hymns'));
}
}