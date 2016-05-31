package com.example.marcgoodman.cuteanimals;

import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.MediaController;
import android.widget.TextView;
import android.widget.VideoView;

/**
 * A simple {@link Fragment} subclass.
 */
public class AnimalVideoFragment extends Fragment {
    private String mCaption;
    private String mVideo;

    public AnimalVideoFragment() {
        // Required empty public constructor
    }

    public void setCaption(String caption) {
        mCaption = caption;
    }

    public void setVideo(String video) {
        mVideo = video;
    }

    @Override
    public void onStart() {
        super.onStart();
        TextView textView = (TextView) getActivity().findViewById(R.id.caption);
        VideoView videoView = (VideoView) getActivity().findViewById(R.id.video_view);

        textView.setText(mCaption);
        MediaController controller = new MediaController(getActivity());
        controller.setAnchorView(videoView);

        Uri uri = Uri.parse(mVideo);
        videoView.setVideoURI(uri);
        videoView.setMediaController(controller);
        videoView.start();
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_animal_video, container, false);
    }

}