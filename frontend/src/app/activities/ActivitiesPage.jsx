import { endpoint } from '../../configs';
import { fetchJSON } from '../../utils';
import LoadingPage from '../../components/LoadingPage';
import MainSection from './MainSection';
import NationalMeetingsSection from './NationalMeetingsSection';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';
import PageMeta from '../../components/PageMeta';

export default function ActivitiesPage() {
  const page = useSWR(`${endpoint}/api/page/activities`, fetchJSON);

  if (page.isLoading) return <LoadingPage />;
  if (page.error) return <LoadFailedPage />;

  return (
    <>
      <PageMeta
        title='Activities - CIMSA ULM'
        description='Explore our various activities like our programs & our trainings at CIMSA ULM.'
      />
      <main style={{ lineHeight: '1.7' }}>
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
                ).long_text_content
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
                ).long_text_content
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
                ).long_text_content
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
      </main>
    </>
  );
}
