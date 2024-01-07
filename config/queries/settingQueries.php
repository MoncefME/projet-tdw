<?php
class SettingQueries
{
    const getContactInformations = "SELECT * FROM contactinformations";
    const updateContactInformations = "UPDATE contactinformations SET email = ?, phone = ?, address = ?, website = ?, facebook_link = ?, twitter_link = ?, youtube_link = ?, linkedin_link = ?, instagram_link = ? WHERE id = 1";
    const getGuideAchat = "SELECT * FROM guidedachat";
    const updateGuideAchat = "UPDATE guidedachat SET title = ?, content = ?, updated_at = ? WHERE id = 1";
    const addGuideAchat = "INSERT INTO guidedachat (title, content, updated_at) VALUES (?, ?, ?)";
}