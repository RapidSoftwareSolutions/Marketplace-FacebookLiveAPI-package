[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/FacebookLiveAPI/functions?utm_source=RapidAPIGitHub_FacebookLiveFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# FacebookLiveAPI Package
Stream, search and manage live video on Facebook.

## How to get credentials: 
 0. [Go to the Facebook online console](https://developers.facebook.com/tools/explorer/145634995501895/?method=POST&path=1417308701%2Ffeed&version=v2.7&message=Just%20testing%20FB%20API%20package)
 1. Press the get token button.

## FacebookLiveAPI.getLiveVideo
Allows to get information about live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| credentials| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: The ID of the live video.

## FacebookLiveAPI.createLiveVideo
Allows to create live video.

| Field             | Type  | Description
|-------------------|-------|----------
| accessToken       | credentials| Required: Your accessToken obtained from Facebook.
| edge              | String| Required: valid liveVideoId.
| contentTags       | String| Optional: Tags that describe the contents of the video. Use search endpoint with type=adinterest to get possible IDs.
| description       | String| Optional: The description of the live video.
| isAudioOnly       | String| Optional: Flag to indicate that the broadcast is audio-only andhas no video stream.
| plannedStartTime  | String| Optional: Unix timestamp when the broadcaster plans to go live.
| privacy           | String| Optional: Privacy for this live video.
| published         | String| Optional: Set this to false to preview the stream before going live. Deprecated. Prefer setting the status instead.
| saveVod           | String| Optional: Whether or not the video data should be saved for later consumption in VOD format. Default is true, except for certain broadcasts types (e.g. AMBIENT)
| status            | Select| Optional: Choose between UNPUBLISHED or LIVE_NOW.
| stopOnDeleteStream| String| Optional: Default value: true. Set this to true if stream should be stopped when deleteStream RTMP command received.
| streamType        | String| Optional: The type of stream. Default value: REGULAR. Use AMBIENT for continuous broadcasts that last days or weeks (like panda cams). Ambient broadcasts do not generate VOD or notifications.
| targeting         | JSON  | Optional: Object and looks like only for page_id edge that limits the audience for this content. Anyone not in these demographics will not be able to view this content.
| title             | String| Optional: The title of the live video.

## FacebookLiveAPI.updateLiveVideo
Allows to update live video.

| Field                         | Type  | Description
|-------------------------------|-------|----------
| accessToken                   | credentials| Required: Your accessToken obtained from Facebook.
| liveVideoId                   | String| Required: valid liveVideoId.
| contentTags                   | String| Optional: Tags that describe the contents of the video. Use search endpoint with type=adinterest to get possible IDs.
| copyrightsViolationDialogState| String| Optional: Broadcaster-FB dialog regarding copyrights violation found, if any.
| description                   | String| Optional: The description of the live video.
| disturbing                    | String| Optional: If true, autoplay will be disabled and live video will have a graphic content warning overlay.
| embeddable                    | String| Optional: If true, live video will be embeddable.
| endLiveVideo                  | String| Optional: If true, the live video will be ended. Only valid if the live video is still running.
| isAudioOnly                   | String| Optional: Flag to indicate that the broadcast is audio-only andhas no video stream.
| place                         | String| Optional: Location associated with the video, if any.
| privacy                       | String| Optional: Privacy for this live video.
| published                     | String| Optional: Set this to false to preview the stream before going live. Deprecated. Prefer setting the status instead.
| sponsorId                     | String| Optional: Facebook Page id that is tagged as sponsor in the video post.
| status                        | Select| Optional: Choose between UNPUBLISHED or LIVE_NOW.
| streamType                    | String| Optional: The type of stream. Default value: REGULAR. Use AMBIENT for continuous broadcasts that last days or weeks (like panda cams). Ambient broadcasts do not generate VOD or notifications.
| tags                          | String| Optional: Users tagged in the live video.
| targeting                     | JSON  | Optional: Object and looks like only for page_id edge that limits the audience for this content. Anyone not in these demographics will not be able to view this content.
| title                         | String| Optional: The title of the live video.

## FacebookLiveAPI.deleteLiveVideo
Allows to delete live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| credentials| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: valid liveVideoId.

## FacebookLiveAPI.getLiveVideoLikes
Allows to retrive likes for live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| credentials| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: valid liveVideoId.

## FacebookLiveAPI.getLiveVideoComments
Allows to retrive comments for live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| credentials| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: valid liveVideoId.
| filter     | String| Optional: Default value: toplevelfilter.
| liveFilter | String| Optional: Default value: filter_low_quality. For comments on a Live streaming video, this determines whether low quality comments will be filtered out of the results (filtering is enabled by default). In all other circumstances this parameter is ignored.
| order      | String| Optional: Preferred ordering of the comments. Accepts chronological (oldest first) and reverse chronological (newest first). If the comments can be ranked, then the order will always be ranked regardless of this modifier.

## FacebookLiveAPI.getLiveVideoErrors
Allows to retrive errors for live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| credentials| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: valid liveVideoId.

## FacebookLiveAPI.getLiveVideoReactions
Allows to retrive reactions for live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| credentials| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: valid liveVideoId.
| type       | Select| Optional: Reaction type. Avaliable values: NONE, LIKE, LOVE, WOW, HAHA, SAD, ANGRY, THANKFUL.

