import AboutUsSection from './AboutUsSection';
import Banner from './Banner';
import BlogSection from '../../components/BlogSection';
import NumberOfThingsSection from './NumberOfThingsSection';
import QuoteSection from './QuoteSection';
import VisionMissionSection from './VisionMissionSection';
import { fetchJSON, setPageMeta } from '../../utils';
import LoadingPage from '../../components/LoadingPage';
import { endpoint } from '../../configs';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';
import LoadFailedPage from '../../components/LoadFailedPage';

export default function HomePage() {
  setPageMeta(
    'CIMSA ULM',
    "Center for Indonesian Medical Students' Activities - Universitas Lambung Mangkurat"
  );

  const page = useSWR(`${endpoint}/api/page/landing`, fetchJSON);
  const posts = useSWR(`${endpoint}/api/post?page=1&limit=6`, fetchJSON);

  if (page.error || posts.error) {
    return <LoadFailedPage />;
  }

  if (page.isLoading || posts.isLoading) {
    return <LoadingPage />;
  }

  return (
    <>
      <Banner
        title={
          page.data.contents.find((x) => x.column === 'banner-title')
            .text_content
        }
        image={
          page.data.contents.find((x) => x.column === 'banner-image')
            .galleries[0].url
        }
      />
      <br />
      <VisionMissionSection
        vision={
          <HtmlParser
            html={
              page.data.contents.find((x) => x.column === 'vision').text_content
            }
          />
        }
        visionImage={
          page.data.contents.find((x) => x.column === 'vision-image')
            .galleries[0].url
        }
        mission={
          <HtmlParser
            html={
              page.data.contents.find((x) => x.column === 'mission')
                .text_content
            }
          />
        }
        missionImage={
          page.data.contents.find((x) => x.column === 'mission-image')
            .galleries[0].url
        }
      />
      <br />
      <hr />
      <NumberOfThingsSection
        statistics={JSON.parse(
          page.data.contents.find((x) => x.column === 'statistics').text_content
        )}
      />
      <hr />
      <br />
      <AboutUsSection
        about={
          <HtmlParser
            html={
              page.data.contents.find((x) => x.column === 'about-us')
                .text_content
            }
          />
        }
        bgImage={
          page.data.contents.find((x) => x.column === 'about-us-bg-image')
            .galleries[0].url
        }
      />
      <br />
      <hr />
      <br />
      <BlogSection posts={posts.data.data} />
      <br />
      <hr />
      <br />
      <QuoteSection
        quote={
          <HtmlParser
            html={
              page.data.contents.find((x) => x.column === 'quote').text_content
            }
          />
        }
        author={
          page.data.contents.find((x) => x.column === 'quote-author')
            .text_content
        }
        image={
          page.data.contents.find((x) => x.column === 'quote-image')
            .galleries[0].url
        }
      />
    </>
  );
}
