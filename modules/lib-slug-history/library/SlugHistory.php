<?php
/**
 * SlugHistory
 * @package lib-slug-history
 * @version 0.0.1
 */

namespace LibSlugHistory\Library;

use LibSlugHistory\Model\SlugHistory as SHistory;

class SlugHistory
{

    public static function create(string $group, string $id, string $old, string $new): bool {
        return !!SHistory::create([
            'group' => $group,
            'object' => $id,
            'old' => $old,
            'new' => $new
        ]);
    }

    public static function get(string $group, string $slug): ?object {
        $history = SHistory::getOne(['group'=>$group, 'old'=>$slug]);
        if(!$history)
            return null;
        $last = SHistory::getOne(['group'=>$group, 'object'=>$history->object], ['created'=>false]);
        if($last)
            return $last;
        return null;
    }

    public static function goto(string $group, string $slug, string $route, array $params): bool {
        $next = self::get($group, $slug);
        if(!$next)
            return false;

        foreach($params as $key => $val){
            if($val === '$')
                $params[$key] = $next->new;
        }

        $url = \Mim::$app->router->to($route, $params);

        \Mim::$app->res->redirect($url, 301);

        return true;
    }

    public static function index(string $group, string $id): array {
        $result = SHistory::get(['group'=>$group, 'object'=>$id]);
        return !$result ? [] : $result;
    }

    public static function remove(string $group, string $id): void {
        SHistory::remove(['group'=>$group, 'object'=>$id]);
    }
}