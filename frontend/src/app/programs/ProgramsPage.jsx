import PageHeader from '../../components/PageHeader';
import ProgramsHeader from './ProgramsHeader';
import ProgramSection from './ProgramSection';
import { useEffect } from 'react';
import { useLocation } from 'react-router';
import { fetchJSON, scrollById } from '../../utils';
import PrimaryButton from '../../components/PrimaryButton';
import BlogSection from '../../components/BlogSection';
import LoadingPage from '../../components/LoadingPage';
import LoadFailedPage from '../../components/LoadFailedPage';
import { endpoint } from '../../configs';
import HtmlParser from '../../components/HtmlParser';
import useSWR from 'swr';
import PageMeta from '../../components/PageMeta';

export default function ProgramsPage() {
  const location = useLocation();

  useEffect(() => scrollById(location.hash), [location]);

  const page = useSWR(`${endpoint}/api/page/programs`, fetchJSON);
  const posts = useSWR(`${endpoint}/api/post?page=1&limit=3`, fetchJSON);

  if (page.isLoading || posts.isLoading) {
    return <LoadingPage />;
  }

  if (page.error || posts.error) {
    return <LoadFailedPage />;
  }

  return (
    <>
      <PageMeta
        title='Programs - CIMSA ULM'
        description='We manifest the will to achieve our goals through ways that are relevant-to-the-issue, sustainable, and accountable.'
      />
      <main>
        <PageHeader
          title='Our Programs'
          description={
            <HtmlParser
              html={
                page.data.contents.find((x) => x.column == 'description')
                  .long_text_content
              }
            />
          }
        />
        <ProgramsHeader />
        <br />
        <br />
        <ProgramSection
          endSection={false}
          id='activities'
          title='ACTIVITIES'
          // subtitle={
          //   programs.find((item) => item.name.toUpperCase() === 'ACTIVITIES')
          //     .description
          // }
          body={
            <HtmlParser
              html={
                page.data.contents.find(
                  (x) => x.column == 'activities-description'
                ).long_text_content
              }
            />
          }
          // 'https://www.system-concepts.com/wp-content/uploads/2020/02/excited-minions-gif.gif'
          images={page.data.contents
            .find((x) => x.column == 'activities-images')
            .galleries.map((gallery) => gallery.url)}
        />
        <BlogSection
          includeEndDivider={true}
          posts={posts.data.data}
          header={
            <center>
              <h3>
                <b>We'll keep you updated.</b>
              </h3>
              <h4 style={{ fontWeight: 'normal', marginBottom: '15px' }}>
                We publish our activities through our blog.
              </h4>
            </center>
          }
        />
        <br />
        <ProgramSection
          id='advocacy'
          title='ADVOCACY'
          body={
            <HtmlParser
              html={
                page.data.contents.find(
                  (x) => x.column == 'advocacy-description'
                ).long_text_content
              }
            />
          }
          images={page.data.contents
            .find((x) => x.column == 'advocacy-images')
            .galleries.map((gallery) => gallery.url)}
        />
        <ProgramSection
          id='research'
          title='RESEARCH'
          body={
            <HtmlParser
              html={
                page.data.contents.find(
                  (x) => x.column == 'research-description'
                ).long_text_content
              }
            />
          }
          images={page.data.contents
            .find((x) => x.column == 'research-images')
            .galleries.map((gallery) => gallery.url)}
        />
        <ProgramSection
          id='capacity-building'
          title='CAPACITY BUILDING'
          body={
            <>
              <HtmlParser
                html={
                  page.data.contents.find(
                    (x) => x.column == 'capacity-building-description'
                  ).long_text_content
                }
              />
              <br />
              <br />
              <PrimaryButton to='/trainings'>
                <i
                  className='fa-solid fa-arrow-right'
                  style={{ marginRight: '6.95px' }}
                />{' '}
                Our Trainers
              </PrimaryButton>
            </>
          }
          images={page.data.contents
            .find((x) => x.column == 'capacity-building-images')
            .galleries.map((gallery) => gallery.url)}
        />
      </main>
    </>
  );
}
