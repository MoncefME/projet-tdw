<?php
class SettingQueries
{
    public static function getContactInformations()
    {
        return "SELECT * FROM contactinformations";
    }
    public static function updateContactInformations()
    {
        return "UPDATE contactinformations SET email = ?, phone = ?, address = ?, website = ?, facebook_link = ?, twitter_link = ?, youtube_link = ?, linkedin_link = ?, instagram_link = ? WHERE id = 1";
    }

    public static function getGuideAchat()
    {
        return "SELECT * FROM guideachat";
    }
    public static function updateGuideAchat()
    {
        return "UPDATE guideachat SET title = ?, content = ?, updated_at = ? WHERE id = 1";
    }
}
