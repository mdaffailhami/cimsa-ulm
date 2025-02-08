import PrimaryButton from './components/PrimaryButton';
import PageMeta from './components/PageMeta';

export default function NotFoundPage() {
  return (
    <>
      <PageMeta
        title='Not Found - CIMSA ULM'
        description={'Page not found (404)'}
      />
      <main
        style={{
          display: 'flex',
          justifyContent: 'center',
          alignItems: 'center',
          flexDirection: 'column',
          height: '93vh',
        }}
      >
        <h1 className='display-1 fw-bold'>404</h1>
        <p className='fs-4 text-center'>
          Oops! The page you're looking for doesn't exist.
        </p>
        <PrimaryButton to={'/'} isLarge={false}>
          <b>Go to Home Page</b>
        </PrimaryButton>
      </main>
    </>
  );
}
