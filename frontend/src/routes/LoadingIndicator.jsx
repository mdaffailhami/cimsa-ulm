import { Spinner } from 'react-bootstrap';

function MySpinner({ color }) {
  return (
    <Spinner
      animation='grow'
      style={{ color: color, width: '90px', height: '40px' }}
    />
  );
}

export default function LoadingIndicator({ center = true, color = 'red' }) {
  if (center) {
    return (
      <div
        style={{
          display: 'flex',
          justifyContent: 'center',
          alignItems: 'center',
          height: '95vh',
        }}
      >
        <MySpinner color={color} />
      </div>
    );
  } else {
    return <MySpinner color={color} />;
  }
}
