<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PolygonsModel extends Model
{
    protected $table = 'polygon'; // atau 'polygons' jika tabel kamu plural
    protected $guarded = ['id'];

    public function geojson_polygons()
    {
        // Ambil data polygon lengkap dengan nama user
        $polygons = DB::table('polygon') // sesuaikan nama tabel jika 'polygons'
            ->select(DB::raw('
                polygon.id,
                ST_AsGeoJSON(polygon.geom) as geom,
                polygon.name,
                polygon.description,
                polygon.image,
                ST_Area(polygon.geom, true) as area_m2,
                ST_Area(polygon.geom, true)/10000 as area_hektar,
                ST_Area(polygon.geom, true)/1000000 as area_km2,
                polygon.created_at,
                polygon.updated_at,
                polygon.user_id,
                users.name as user_created
            '))
            ->leftJoin('users', 'polygon.user_id', '=', 'users.id')
            ->get();

        // Bentuk struktur GeoJSON
        $geojson = [
            'type' => 'FeatureCollection',
            'features' => [],
        ];

        foreach ($polygons as $p) {
            $geojson['features'][] = [
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'image' => $p->image,
                    'area_m2' => $p->area_m2,
                    'area_hektar' => $p->area_hektar,
                    'area_km2' => $p->area_km2,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at,
                    'user_id' => $p->user_id,
                    'user_created' => $p->user_created,
                ],
            ];
        }

        return $geojson;
    }

    public function geojson_polygon($id)
    {
        // Ambil satu polygon berdasarkan ID
        $polygon = DB::table('polygon') // sesuaikan nama tabel
            ->select(DB::raw('
                polygon.id,
                ST_AsGeoJSON(polygon.geom) as geom,
                polygon.name,
                polygon.description,
                polygon.image,
                ST_Area(polygon.geom, true) as area_m2,
                ST_Area(polygon.geom, true)/10000 as area_hektar,
                ST_Area(polygon.geom, true)/1000000 as area_km2,
                polygon.created_at,
                polygon.updated_at,
                polygon.user_id,
                users.name as user_created
            '))
            ->leftJoin('users', 'polygon.user_id', '=', 'users.id')
            ->where('polygon.id', $id)
            ->first();

        if (!$polygon) {
            return null; // atau bisa return response()->json(['message' => 'Not found'], 404);
        }

        return [
            'type' => 'FeatureCollection',
            'features' => [[
                'type' => 'Feature',
                'geometry' => json_decode($polygon->geom),
                'properties' => [
                    'id' => $polygon->id,
                    'name' => $polygon->name,
                    'description' => $polygon->description,
                    'image' => $polygon->image,
                    'area_m2' => $polygon->area_m2,
                    'area_hektar' => $polygon->area_hektar,
                    'area_km2' => $polygon->area_km2,
                    'created_at' => $polygon->created_at,
                    'updated_at' => $polygon->updated_at,
                ],
            ]],
        ];
    }
}
