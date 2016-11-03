# FacebookLiveAPI Package
Facebook Live is a fun and powerful way to connect with your followers by creating rich stories on Facebook in real time. The Live API allows you to create stories on Facebook using live video content from a variety of sources.


## TOC: 
* [getLiveVideo](#getLiveVideo)
* [createLiveVideo](#createLiveVideo)
* [updateLiveVideo](#updateLiveVideo)
* [deleteLiveVideo](#deleteLiveVideo)
* [getLiveVideoLikes](#getLiveVideoLikes)
* [getLiveVideoComments](#getLiveVideoComments)
* [getLiveVideoErrors](#getLiveVideoErrors)
* [getLiveVideoReactions](#getLiveVideoReactions)
 
<a name="getLiveVideo"/>
## FacebookLiveAPI.getLiveVideo
Allows to get information about live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: The ID of the live video.

<a name="createLiveVideo"/>
## FacebookLiveAPI.createLiveVideo
Allows to create live video.

| Field             | Type  | Description
|-------------------|-------|----------
| accessToken       | String| Required: Your accessToken obtained from Facebook.
| edge              | String| Required: valid liveVideoId.
| contentTags       | String| Optional: Tags that describe the contents of the video. Use search endpoint with type=adinterest to get possible IDs.
| description       | String| Optional: The description of the live video.
| isAudioOnly       | String| Optional: Flag to indicate that the broadcast is audio-only andhas no video stream.
| plannedStartTime  | String| Optional: Unix timestamp when the broadcaster plans to go live.
| privacy           | String| Optional: Privacy for this live video.
| published         | String| Optional: Set this to false to preview the stream before going live. Deprecated. Prefer setting the status instead.
| saveVod           | String| Optional: Whether or not the video data should be saved for later consumption in VOD format. Default is true, except for certain broadcasts types (e.g. AMBIENT)
| status            | String| Optional: Choose between UNPUBLISHED or LIVE_NOW.
| stopOnDeleteStream| String| Optional: Default value: true. Set this to true if stream should be stopped when deleteStream RTMP command received.
| streamType        | String| Optional: The type of stream. Default value: REGULAR. Use AMBIENT for continuous broadcasts that last days or weeks (like panda cams). Ambient broadcasts do not generate VOD or notifications.
| targeting         | JSON  | Optional: Object and looks like only for page_id edge that limits the audience for this content. Anyone not in these demographics will not be able to view this content.
| title             | String| Optional: The title of the live video.

<a name="updateLiveVideo"/>
## FacebookLiveAPI.updateLiveVideo
Allows to update live video.

| Field                         | Type  | Description
|-------------------------------|-------|----------
| accessToken                   | String| Required: Your accessToken obtained from Facebook.
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
| status                        | String| Optional: Choose between UNPUBLISHED or LIVE_NOW.
| streamType                    | String| Optional: The type of stream. Default value: REGULAR. Use AMBIENT for continuous broadcasts that last days or weeks (like panda cams). Ambient broadcasts do not generate VOD or notifications.
| tags                          | String| Optional: Users tagged in the live video.
| targeting                     | JSON  | Optional: Object and looks like only for page_id edge that limits the audience for this content. Anyone not in these demographics will not be able to view this content.
| title                         | String| Optional: The title of the live video.

<a name="deleteLiveVideo"/>
## FacebookLiveAPI.deleteLiveVideo
Allows to delete live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: valid liveVideoId.

<a name="getLiveVideoLikes"/>
## FacebookLiveAPI.getLiveVideoLikes
Allows to retrive likes for live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: valid liveVideoId.

<a name="getLiveVideoComments"/>
## FacebookLiveAPI.getLiveVideoComments
Allows to retrive comments for live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: valid liveVideoId.
| filter     | String| Optional: Default value: toplevelfilter.
| liveFilter | String| Optional: Default value: filter_low_quality. For comments on a Live streaming video, this determines whether low quality comments will be filtered out of the results (filtering is enabled by default). In all other circumstances this parameter is ignored.
| order      | String| Optional: Preferred ordering of the comments. Accepts chronological (oldest first) and reverse chronological (newest first). If the comments can be ranked, then the order will always be ranked regardless of this modifier.

<a name="getLiveVideoErrors"/>
## FacebookLiveAPI.getLiveVideoErrors
Allows to retrive errors for live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: valid liveVideoId.

<a name="getLiveVideoReactions"/>
## FacebookLiveAPI.getLiveVideoReactions
Allows to retrive reactions for live video.

| Field      | Type  | Description
|------------|-------|----------
| accessToken| String| Required: Your accessToken obtained from Facebook.
| liveVideoId| String| Required: valid liveVideoId.
| type       | String| Optional: Reaction type. Avaliable values: NONE, LIKE, LOVE, WOW, HAHA, SAD, ANGRY, THANKFUL.

