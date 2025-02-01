import { useEffect, useState } from 'react';
import { endpoint } from '../../configs';
import { fetchJSON, setPageMeta } from '../../utils';
import LoadingPage from '../../components/LoadingPage';
import MainSection from './MainSection';
import NationalMeetingsSection from './NationalMeetingsSection';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';

export default function ActivitiesPage() {
  setPageMeta(
    'Activities - CIMSA ULM',
    'Explore our various activities like our programs & our trainings and national meetings at CIMSA ULM.'
  );

  const page = useSWR(`${endpoint}/api/page/activities`, fetchJSON);

  if (page.isLoading) return <LoadingPage />;
  if (page.error) return <LoadFailedPage />;

  return (
    <div style={{ lineHeight: '1.7' }}>
      <MainSection
        programsImage={
          page.data.contents.find((x) => x.column === 'programs-image')
            .galleries[0].url
        }
        programsDesc={
          <HtmlParser
            html={
              page.data.contents.find(
                (x) => x.column === 'programs-description'
              ).text_content
            }
          />
        }
        trainingsImage={
          page.data.contents.find((x) => x.column === 'trainings-image')
            .galleries[0].url
        }
        trainingsDesc={
          <HtmlParser
            html={
              page.data.contents.find(
                (x) => x.column === 'trainings-description'
              ).text_content
            }
          />
        }
      />
      <br />
      <br />
      <NationalMeetingsSection
        nationalMeetingsDesc={
          <HtmlParser
            html={
              page.data.contents.find(
                (x) => x.column === 'national-meetings-description'
              ).text_content
            }
          />
        }
        nationalMeetingsEmbeddedYoutubeUrl={
          page.data.contents.find(
            (x) => x.column === 'national-meetings-embedded-youtube-url'
          ).text_content
        }
        becomeDelegatesUrl={
          page.data.contents.find((x) => x.column === 'become-delegates-url')
            .text_content
        }
      />
    </div>
  );
}
